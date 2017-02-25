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

  //REQUIRED:
  //          -password encryption.
  //          -ensure studentIDs entered are unique
  //          -ensure emails are unique
  //          -ensure banned users are not trying to sign up again (check email and studentID)
  //          -connection through SSL for login/ sign up
  if($val->isValidSignUp($firstName, $lastName, $signUpEmail, $StudentID, $subject, $signUpPassword, $passwordConfirm)){
    if($connection){
      include('includes/php/utils/QueryHelper.class.php');
      $qh = new QueryHepler();

      $subjectID = $qh->getSubjectIdFromSubjectName($subject);
      $result = $qh -> insertUser($StudentID, $subjectID, $firstName, $lastName, $signUpEmail, $signUpPassword);

      if($result){
        header('Location: thank-you.php');
        exit();
      }
    }
  }
}

?>
