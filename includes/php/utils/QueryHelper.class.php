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

  function insertUser($StudentID, $subjectID, $firstName, $lastName, $signUpEmail, $signUpPassword){
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
                          `IsMod`
                          )
                          VALUES (
                          '',  '$subjectID',  '$firstName',  '$lastName',  '$signUpEmail', '$StudentID', '$signUpPassword',  '0',  '0'
                        );";

    $result = $database -> query($insertSql);

    return $result;
  }
}

?>
