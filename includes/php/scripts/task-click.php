<?php

include('includes/php/utils/TaskRetriever.class.php');
include('includes/php/utils/User.class.php');

if(isset($_GET['taskID'])){
  $taskID = $_GET['taskID'];
  $retriever = new TaskRetriever();

  $task = $retriever -> getTask($taskID);

  $title = $task -> getTaskTitle();
  $description = $task -> getTaskDescription();
  $docType = $task -> getDocType();
  $numWords = $task -> getNumWords();
  $numPages = $task -> getNumPages();
  $completeDate = $task -> getCompleteDeadline();
  $claimDate = $task -> getClaimDeadline();
  $status = $task -> getStatus();
  $owner = $task -> getOwnerID();
  $claimant = $task -> getClaimantID();

  $currentUser = User::getCurrentUser($_SESSION['email']);

  $userID = $currentUser -> getUserID($_SESSION['email']);
  $userReputation = $currentUser -> getReputation();


}
?>
