<?php
  include_once('includes/php/utils/QueryHelper.class.php');
  include_once('includes/php/utils/Validator.class.php');
  include_once('includes/php/utils/Database.class.php');
  include_once('includes/php/scripts/profile-info.php');
  if(isset($_POST['submit-edit'])){
    $qh = new QueryHelper();
    $db = new Database();
    $val = new Validator();
    $update = false;


    $editName = trim($db -> quote($_POST['editable-name']));
    $editEmail = trim($db -> quote($_POST['editable-email']));
    $editStudentID = trim($db -> quote($_POST['editable-studentid']));
    $editSubject = trim($db -> quote($_POST['editable-subject']));

    if($val -> isValidProfileEdit($editName, $editEmail, $editStudentID, $editSubject)){
      if(!($editName == $profileFirstname." ".$profileLastname)){
        $names = explode(" ", $editName);
        $firstName = $names[0];
        $lastName = $names[1];
        $qh -> updateName($firstName ,$lastName, $userID);
        $update = true;
      }
      if(!($editEmail == $profileEmailAddress)){
        $qh -> updateEmail($editEmail, $userID);
        $update = true;
      }
      if(!($editStudentID == $profileStudentID)){
        $qh -> updateStudentID($editStudentID, $userID);
        $update = true;
      }
      if(!($editSubject == $profileSubject)){
        $qh -> updateSubject($editSubject, $userID);
        $update = true;
      }
      if($update){
        header("location: profile.php?userID=$profileID");
      }
    }
    else{
      echo "<script>alert('Invalid input')</script>";
    }

  }

 ?>
