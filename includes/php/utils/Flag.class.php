<?php
class Flag{
  private $flagID;
  private $taskID;
  private $complaint;

  function __construct($flagID, $taskID, $complaint){
    $this->flagID = $flagID;
    $this->taskID = $taskID;
    $this->complaint = $complaint;
  }

  function setFlagID($flagID) { $this->flagID = $flagID; }
  function getFlagID() { return $this->flagID; }
  function setTaskID($TaskID) { $this->TaskID = $TaskID; }
  function getTaskID() { return $this->TaskID; }
  function setComplaint($complaint) { $this->complaint = $complaint; }
  function getComplaint() { return $this->complaint; }
}

 ?>
