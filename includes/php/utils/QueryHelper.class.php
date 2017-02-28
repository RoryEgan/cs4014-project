<?php

class QueryHepler{
  function getSubjectIdFromSubjectName($subject){
    $database = new Database();
    $selectSubjectIdQuery = "SELECT *
                             FROM Subject
                             WHERE SubjectName = '$subject';";

    $subjectIdResult = $database -> select($selectSubjectIdQuery);
    $subjectID = $subjectIdResult[0]['SubjectID'];

    return $subjectID;
  }

  function insertUser($StudentID, $subjectID, $firstName, $lastName, $signUpEmail, $signUpPassword, $passwordSalt){
    $database = new Database();
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
                          '',  '$subjectID',  '$firstName',  '$lastName',  '$signUpEmail', '$StudentID', '$signUpPassword',  '0',  '0', '$passwordSalt'
                        );";

    $result = $database -> query($insertSql);

    return $result;
  }

  function getPasswordSalt($email){
    $query = "SELECT *
              FROM User
              WHERE EmailAddress = '$email';";

    $result = $database -> select($query);
    $salt = $result[0]['PasswordSalt'];

    return $salt;
  }


  function getUser($email, $hashedPassword){
    $sql = "SELECT *
    FROM User
    WHERE EmailAddress = '$email' AND Password = '$hashedPassword';";
    $res = $db -> select($sql);

    return $res;
  }
}

?>
