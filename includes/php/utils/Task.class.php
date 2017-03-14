
<?php
class Task{
  private $taskID;
  private $ownerID;
  private $status;
  private $taskTitle;
  private $taskType;
  private $taskDescription;
  private $numPages;
  private $numWords;
  private $docFormat;
  private $docType;
  private $document;
  private $tag1;
  private $tag2;
  private $tag3;
  private $tag4;
  private $claimDeadline;
  private $completeDeadline;

  function __construct($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $subject, $document,
                              $tag1, $tag2, $tag3, $tag4, $claimDeadline, $completeDeadline){

    $this->taskID = -1;
    $this->ownerID = -1;
    $this->status = "Pending Claim";
    $this->taskTitle = $taskTitle;
    $this->taskType = $taskType;
    $this->taskDescription = $taskDescription;
    $this->numPages = $numPages;
    $this->numWords = $numWords;
    $this->docFormat = $docFormat;
    $this->docType = $docType;
    $this->subject = $subject;
    $this->document = $document;
    $this->tag1 = $tag1;
    $this->tag2 = $tag2;
    $this->tag3 = $tag3;
    $this->tag4 = $tag4;
    $this->claimDeadline = $claimDeadline;
    $this->completeDeadline = $completeDeadline;
  }

  function setTaskID($taskID) { $this->taskID = $taskID; }
  function getTaskID() { return $this->taskID; }
  function setOwnerID($ownerID) { $this->ownerID = $ownerID; }
  function getOwnerID() { return $this->ownerID; }
  function setStatus($status) { $this->status = $status; }
  function getStatus() { return $this->status; }
  function setTaskTitle($taskTitle) { $this->taskTitle = $taskTitle; }
  function getTaskTitle() { return $this->taskTitle; }
  function setTaskType($taskType) { $this->taskType = $taskType; }
  function getTaskType() { return $this->taskType; }
  function setTaskDescription($taskDescription) { $this->taskDescription = $taskDescription; }
  function getTaskDescription() { return $this->taskDescription; }
  function setNumPages($numPages) { $this->numPages = $numPages; }
  function getNumPages() { return $this->numPages; }
  function setNumWords($numWords) { $this->numWords = $numWords; }
  function getNumWords() { return $this->numWords; }
  function setDocFormat($docFormat) { $this->docFormat = $docFormat; }
  function getDocFormat() { return $this->docFormat; }
  function setDocType($docType) { $this->docType = $docType; }
  function getDocType() { return $this->docType; }
  function setSubject($subject) { $this->subject = $subject; }
  function getSubject() { return $this->subject; }
  function setDocument($document) { $this->document = $document; }
  function getDocument() { return $this->document; }
  function setTag1($tag1) { $this->tag1 = $tag1; }
  function getTag1() { return $this->tag1; }
  function setTag2($tag2) { $this->tag2 = $tag2; }
  function getTag2() { return $this->tag2; }
  function setTag3($tag3) { $this->tag3 = $tag3; }
  function getTag3() { return $this->tag3; }
  function setTag4($tag4) { $this->tag4 = $tag4; }
  function getTag4() { return $this->tag4; }
  function setClaimDeadline($claimDeadline) { $this->claimDeadline = $claimDeadline; }
  function getClaimDeadline() { return $this->claimDeadline; }
  function setCompleteDeadline($completeDeadline) { $this->completeDeadline = $completeDeadline; }
  function getCompleteDeadline() { return $this->completeDeadline; }

  function getTag($tagNum){
    switch ($tagNum) {
      case 1:
        return $this -> getTag1();
      case 2:
        return $this -> getTag2();
      case 3:
        return $this -> getTag3();
      case 4:
        return $this -> getTag4();
    }
  }
}
