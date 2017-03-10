<?php

$database = new Database();

class QueryHepler{

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

                         '0',  '$subjectID',  '$firstName',  '$lastName',  '$signUpEmail', '$studentID', '$signUpPassword',  '0',  '0', '$passwordSalt'
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
}




















?>
