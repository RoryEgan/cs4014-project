<?php
include_once('/var/www/html/cs4014/config.php');
include_once(SITE_PATH . '/includes/php/utils/QueryHelper.class.php');

class User{
  private $userID;
  private $subject;
  private $foreName;
  private $lastname;
  private $emailAddress;
  private $studentID;
  private $reputation;
  private $isMod;

  function setUserID($userID) { $this->userID = $userID; }
  function getUserID() { return $this->userID; }
  function setSubject($subject) { $this->subject = $subject; }
  function getSubject() { return $this->subject; }
  function setForeName($foreName) { $this->foreName = $foreName; }
  function getForeName() { return $this->foreName; }
  function setLastname($lastname) { $this->lastname = $lastname; }
  function getLastname() { return $this->lastname; }
  function setEmailAddress($emailAddress) { $this->emailAddress = $emailAddress; }
  function getEmailAddress() { return $this->emailAddress; }
  function setStudentID($studentID) { $this->studentID = $studentID; }
  function getStudentID() { return $this->studentID; }
  function setReputation($reputation) { $this->reputation = $reputation; }
  function getReputation() { return $this->reputation; }
  function setIsMod($isMod) { $this->isMod = $isMod; }
  function getIsMod() { return $this->isMod; }

  //This function is a static method used to return the current user of the website.
  //Allows us to access info on the current user without having to query the database each time.
  public static function getCurrentUser($email){
    $qh = new QueryHelper();

    $userInfo = array();

    $userInfo = $qh -> getUserInfo($email);

    $currentUser = new User();

    $currentUser -> setUserID($userInfo[0]);
    $currentUser -> setSubject($userInfo[1]);
    $currentUser -> setForeName($userInfo[2]);
    $currentUser -> setLastname($userInfo[3]);
    $currentUser -> setEmailAddress($email);
    $currentUser -> setStudentID($userInfo[4]);
    $currentUser -> setReputation($userInfo[5]);
    $currentUser -> setIsMod($userInfo[6]);

    return $currentUser;
  }
}


?>
