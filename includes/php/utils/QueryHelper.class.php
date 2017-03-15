<?php

include('includes/php/utils/Database.class.php');

$database = new Database();

class QueryHelper{

  //The database class is paired with this class exclusively (to simplify includes) thus we require this
  //functionality at times.
  function select($query){
    global $database;

    $res = $database -> select($query);
    return $res;
  }

  function getSubjectIdFromSubjectName($subject){
    global $database;

    $selectSubjectIdQuery = "SELECT *
                             FROM Subject
                             WHERE SubjectName = '$subject';";


    $subjectIdResult = $database -> select($selectSubjectIdQuery);
    $subjectID = $subjectIdResult[0]['SubjectID'];

    return $subjectID;
  }

  function insertUser($studentID, $subjectID, $firstName, $lastName, $signUpEmail, $signUpPassword, $passwordSalt){
    global $database;

    $insertSql = "INSERT INTO   `CS4014_project_database`.`User` (
                          `UserID` ,
                          `Subject_SubjectID` ,
                          `ForeName` ,
                          `LastName` ,
                          `EmailAddress` ,
                          `StudentID`,
                          `Password` ,
                          `Reputation` ,
                          `IsMod`,
                          `PasswordSalt`
                          )
                          VALUES (

                         NULL,  '$subjectID',  '$firstName',  '$lastName',  '$signUpEmail', '$studentID', '$signUpPassword',  '0',  '0', '$passwordSalt'
                        );";

    $result = $database -> query($insertSql);

    return $result;
  }

  //returns the password salt that belongs to a particular user.
  function getPasswordSalt($email){
    global $database;
    $query = "SELECT *
              FROM User
              WHERE EmailAddress = '$email';";

    $result = $database -> select($query);
    $salt = $result[0]['PasswordSalt'];

    return $salt;
  }

  //returns a user with the specified email and password or false if the user does not exist.
  function getUser($email, $hashedPassword){
    global $database;

    $sql = "SELECT *
    FROM User
    WHERE EmailAddress = '$email' AND Password = '$hashedPassword';";

    $res = $database -> select($sql);



    return $res;
  }

  //check if the email is already used or belongs to banned user.
  function isUniqueEmail($inputEmail){
    global $database;

    $bannedUserQuery = "SELECT EmailAddress
                        From BannedUser
                        WHERE EmailAddress = '$inputEmail';";
    $bannedUserResult = $database -> select($bannedUserQuery);

    //if we get false back from our select query we proceed to check if this email is in the user table.
    if(!$bannedUserResult){

      $userQuery = "SELECT EmailAddress
                          From User
                          WHERE EmailAddress = '$inputEmail';";
      $userResult = $database -> select($userQuery);

      //if the email is not in the user table we return true.
      if(!$userResult){
        return true;
      }
      else{
        return false;
      }
    }
    else{
      return false;
    }
  }

  function verifyDropDownInput($input, $selectQuery, $columnName){
    global $database;

    $result = $database -> select($selectQuery);

    for($i = 0; $i < count($result); $i++){
      if($input == $result[$i][$columnName]){
        return true;
      }
    }
    return false;
  }

  function insertTask($task){
    global $database;

    //collect the data required to insert into task table.
    $taskTypeID = $this -> getTaskTypeIDFromTaskType($task->getTaskType());
    $subjectID = $this -> getSubjectIDFromSubjectName($task -> getSubject());
    $title = $task -> getTaskTitle();
    $description = $task -> getTaskDescription();
    $numPages = $task -> getNumPages();
    $numWords = $task -> getNumWords();


    $currentUser = User::getCurrentUser($_SESSION['email']);
    $userID = $currentUser -> getUserID();
    echo "user ID is: $userID";

    //sql statement
    $taskInsert = "INSERT INTO `CS4014_project_database`.`Task`(
      `TaskID`,
      `User_UserID`,
      `TaskType_TaskTypeID`,
      `Subject_SubjectID`,
      `Status_StatusID`,
      `Title`,
      `Description`,
      `NumPages`,
      `NumWords`,
      `ClaimantID`)
    VALUES (NULL,$userID, $taskTypeID, $subjectID,2,'$title','$description',$numPages,$numWords,NULL);";
    //execute query
    $taskInsertSuccess = $database -> query($taskInsert);

    $taskID = $database -> getLastInsertID();
    $task -> setTaskID($taskID);



    if(!$taskInsertSuccess){
      echo "failed to insert task";
      return false;
    }
    else{
      //insert into the associated tables.
      $deadlineInsert = $this -> insertDeadlines($task);
      if(!$deadlineInsert){
        echo "Failed to insert deadlines";
        return false;
      }
      $docInsert = $this -> insertDocument($task);
      if(!$docInsert){
        echo "Failed to insert document";
        return false;
      }
      $taskTagInsert = $this -> insertTaskTags($task);
      if(!$taskTagInsert){
        echo "Failed to insert tasktag";
        return false;
      }
      return true;
    }
  }


  function insertDocument($task){
    global $database;

    $document = $task -> getDocument();
    $location = $document['tmp_name'];
    $targetFile = basename($document['name']);
    $ext = $task -> getDocFormat();

    $fileNameNew = uniqid('', true) . $ext;

    $fileDestination = 'files/documents/' . $fileNameNew;

    echo "<pre>\noriginal location: $location\t new location: $fileDestination\n</pre>";

    if(move_uploaded_file($location, $fileDestination)){
      $taskID = $task -> getTaskID();
      $format = $task -> getDocFormat();
      $docType = $task -> getDocType();
      $formatID = $this -> getFormatIDFromFormat($format);
      $documentTypeID = $this -> getDocTypeIDFromDocType($docType);

      echo "task id: $taskID formatID: $formatID docType: $documentTypeID fileDest: $fileDestination format: $format";


      $insertSQL = "INSERT INTO `CS4014_project_database`.`Document`(
        `DocumentID`,
        `DocumentURL`,
        `Task_TaskID`,
        `Format_FormatID`,
        `DocumentType_DocumentTypeID`)
      VALUES (NULL,'$fileDestination',$taskID,$formatID,$documentTypeID);";

      $docInsert = $database -> query($insertSQL);
      if($docInsert){
        return true;
      }
    }
    else{
      $error = $document['error'];
      echo "File not uploaded: $error";
    }
  }

  function insertDeadlines($task){
    global $database;

    $claimDeadline = $task -> getClaimDeadline();
    $completeDeadline = $task -> getCompleteDeadline();
    $taskID = $task -> getTaskID();
    echo "task ID: $taskID";

    $sql = "INSERT INTO `CS4014_project_database`.`Deadline`(`Task_TaskID`, `Claim`, `Completion`)
            VALUES($taskID, '$claimDeadline', '$completeDeadline');";

    $deadlineInsert = $database -> query($sql);
    return $deadlineInsert;
  }

  function insertTaskTags($task){
    global $database;
    $insertSuccess = true;

    //get each tag for the task
    $t1 = $task -> getTag1();
    $t2 = $task -> getTag2();
    $t3 = $task -> getTag3();
    $t4 = $task -> getTag4();

    //convert to array for convenience.
    $tags = array($t1, $t2, $t3, $t4);
    $taskID = $task -> getTaskID();

    //for each tag check if it was given a value and if it was we insert into taskTag
    for ($i=0; $i < sizeof($tags); $i++) {
      $currentTag = $task -> getTag($i + 1);
      if($currentTag != 'Tag'){
        $tagID = $this -> getTagIDFromTagVal($currentTag);
        $tagInsert = $database -> query("INSERT INTO `CS4014_project_database`.`TaskTag`
                            (`TaskTagID`, `Tag_TagID`, `Task_TaskID`)
                            VALUES (NULL, $tagID, $taskID);");

        if(!$tagInsert){
          echo "Failed to insert tag: $currentTag";
          $insertSuccess = false;
        }
      }
    }
    if($insertSuccess){
      return true;
    }
    else{
      return false;
    }
  }

  function getTagIDFromTagVal($tagVal){
    global $database;

    $sql = "SELECT * FROM Tag WHERE Value = '$tagVal'";

    $res = $database -> select($sql);

    if(!$res){
      return false;
    }
    else{
      $tagID = $res[0]['TagID'];

      return $tagID;
    }
  }

  function getTaskTypeIDFromTaskType($taskType){
    global $database;

    $taskTypeIDArray = $database -> select("SELECT TaskTypeID FROM TaskType
                                       WHERE TaskTypeVal = '$taskType';");
    $taskTypeID = $taskTypeIDArray[0]['TaskTypeID'];

    return $taskTypeID;
  }


  function getFormatIDFromFormat($format){
    global $database;

    $formatArray = $database -> select("SELECT * FROM Format
                                       WHERE FormatVal = '$format';");
    $formatID = $formatArray[0]['FormatID'];

    return $formatID;
  }

  function getDocTypeIDFromDocType($docType){
    global $database;

    $docTypeArray = $database -> select("SELECT * FROM DocumentType
                                       WHERE DocumentTypeVal = '$docType';");
    $docTypeID = $docTypeArray[0]['DocumentTypeID'];

    return $docTypeID;
  }

  public function getTasksCount() {

    global $database;

    $query = "SELECT COUNT(*) FROM Task;";

    $num = $database -> select($query);

    return $num[0]['COUNT(*)'];
  }



 function getJoinedTaskView(){
   global $database;

   $joinedTaskSQL =  "SELECT * FROM JoinedTask;";

   $result = $database -> select($joinedTaskSQL);

   return $result;
 }

 function getJoinedTask($taskID){
   global $database;

   $joinedTaskSQL =  "SELECT * FROM JoinedTask WHERE TaskID = '$taskID';";

   $result = $database -> select($joinedTaskSQL);

   return $result;
 }

 function getJoinedTagView(){
   global $database;

   $joinedTaskSQL =  "SELECT * FROM JoinedTag;";

   $result = $database -> select($joinedTaskSQL);

   return $result;
 }



 function getUserInfo($emailAddress){
   global $database;

   $userSQL = "SELECT * FROM User WHERE EmailAddress = '$emailAddress';";

   $userResult = $database -> select($userSQL);

   $subject = $this -> getSubjectNameFromSubjectId($userResult[0]['Subject_SubjectID']);
   $isMod = false;

   if($userResult[0]['IsMod'] != 0){
     $isMod = true;
   }

   $userInfo = array($userResult[0]['UserID'], $subject, $userResult[0]['ForeName'], $userResult[0]['Lastname'],
                      $userResult[0]['StudentID'], $userResult[0]['reputation'], $isMod);
    return $userInfo;
 }


 function getSubjectNameFromSubjectId($subjectID){
   global $database;

   $selectSubjectNameQuery = "SELECT *
                            FROM Subject
                            WHERE SubjectID = '$subjectID';";


   $subjectNameResult = $database -> select($selectSubjectNameQuery);
   $subjectName = $subjectNameResult[0]['SubjectName'];

   return $subjectName;
 }



}









?>
