<?php
  include_once('includes/php/utils/User.class.php');
  $userID =  $_SESSION['userID'];
  $currentUser = User::getUser($userID);
  $reputation = $currentUser -> getReputation();
  $subject = $currentUser -> getSubject();
  $firstname = $currentUser -> getForeName();
  $lastname = $currentUser -> getLastname();
  $emailAddress = $currentUser -> getEmailAddress();
  $studentID = $currentUser -> getStudentID();
  $picURL = $currentUser -> getProfilePicURL();
?>
