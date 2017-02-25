<?php


// Honeypot
if( ! $_POST['contact'] == '') return;

// Submission check
if(isset($_POST['signUpButton'])) {
  $firstName = $db->quote(trim($_POST['signUpFirstName']));
  $lastName = $db->quote(trim($_POST['signUpLastName']));
  $signUpEmail = $db->quote(trim(strtolower($_POST['signUpEmail'])));
  $StudentID = $db->quote(trim($_POST['signUpID']));
  $subject = $db->quote($_POST['signUpSubject']);
  $signUpPassword = $db->quote(trim($_POST['signUpPassword']));
  $passwordConfirm = $db->quote(trim($_POST['signUpPasswordConfirm']));
  $connection = $db->connect();

  //REQUIRED: -select operation to get subject ID from chosen subject.
  //          -password encryption.
  //          -ensure studentIDs entered are unique
  //          -ensure emails are unique
  //          -ensure banned users are not trying to sign up again (check email and studentID)
  //          -connection through SSL for login/ sign up
  if($val->isValidSignUp($firstName, $lastName, $signUpEmail, $StudentID, $subject, $signUpPassword, $passwordConfirm)){
    if($connection){

      $selectSubjectIdQuery = "SELECT *
                               FROM Subject
                               WHERE SubjectName = '$subject';";

      $subjectIdResult = $db -> select($selectSubjectIdQuery);
      $subjectID = $subjectID[0]['SubjectID'];

      $insertSql = "INSERT INTO   `CS4014_project_database`.`User` (
                            `StudentID` ,
                            `SubjectID` ,
                            `ForeName` ,
                            `SurName` ,
                            `EmailAddress` ,
                            `Password` ,
                            `Reputation` ,
                            `IsMod`
                            )
                            VALUES (
                            '$StudentID',  '$subjectID',  '$firstName',  '$lastName',  '$signUpEmail',  '$signUpPassword',  '0',  '0'
                          );";

      $result = $db -> query($insertSql);

      if($result){
        header('Location: thank-you.php');
        exit();
      }
    }
  }
}

?>
