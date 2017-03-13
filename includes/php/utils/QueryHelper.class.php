<?php

$database = new Database();

class QueryHelper{

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

    echo "Insert task executed";

    //collect the data required to insert into task table.
    $taskTypeID = $this -> getTaskTypeIDFromTaskType($task->getTaskType());
    $subjectID = $this -> getSubjectIDFromSubjectName($task -> getSubject());
    $title = $task -> getTaskTitle();
    $description = $task -> getTaskDescription();
    $numPages = $task -> getNumPages();
    $numWords = $task -> getNumWords();

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
    VALUES (NULL,1, $taskTypeID, $subjectID,2,'$title','$description',$numPages,$numWords,NULL);";

    //execute query
    $taskInsertSuccess = $database -> query($taskInsert);

    if(!$taskInsertSuccess){
      echo "failed to insert task";
    }
    else{
      //insert into the associated tables.
      $this -> insertDeadlines($task);
      $this -> insertDocument($task);
      $this -> insertTaskTags($task);
      return true;
    }
  }


  function insertDocument($task){

  }

  function insertDeadlines($task){
    global $database;

    $claimDeadline = $task -> getClaimDeadline();
    $completeDeadline = $task -> getCompleteDeadline();

    $sql = "INSERT INTO `CS4014_project_database`.`Deadline`('Task_TaskID', Claim, Completion)
            VALUES('1', '$claimDeadline', '$completeDeadline');";

    $deadlineInsert = $database -> query($sql);
    return $deadlineInsert;
  }

  function insertTaskTags($task){
    global $database;

    //get each tag for the task
    $t1 = $task -> getTag1();
    $t2 = $task -> getTag2();
    $t3 = $task -> getTag3();
    $t4 = $task -> getTag4();

    //convert to array for convenience.
    $tags = array($t1, $t2, $t3, $t4);

    //for each tag check if it was given a value and if it was we insert into taskTag
    for ($i=0; $i < sizeof($tags); $i++) {
      $currentTag = $task -> getTag($i + 1);
      if($currentTag != 'Tag'){
        $tagID = $this -> getTagIDFromTagVal($currentTag);
        $tagInsert = $database -> query("INSERT INTO `CS4014_project_database`.`TaskTag`
                            (`TaskTagID`, `Tag_TagID`, `Task_TaskID`)
                            VALUES (1, $tagID, 1);");

        if(!$tagInsert){
          echo "Failed to insert tag: $currentTag";
        }
      }
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


}



















?>
