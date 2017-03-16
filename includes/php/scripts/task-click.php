<?php

include('includes/php/utils/TaskRetriever.class.php');
include('includes/php/utils/User.class.php');
include('includes/php/utils/DateFormatConverter.class.php');

if(isset($_GET['taskID'])){
  $taskID = $_GET['taskID'];
  $retriever = new TaskRetriever();

  $task = $retriever -> getTask($taskID);

  //This is the information required for the task-details page
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
  $tags = $task -> getTags();
  $tag1 = $tags[0];
  $tag2 = $tags[1];
  $tag3 = $tags[2];
  $tag4 = $tags[3];
  $documentURL = $task->getDocument();

  $converter = new DateFormatConverter();
  $claimDate = $converter -> convert($claimDate);
  $completeDate = $converter -> convert($completeDate);

  $currentUser = User::getCurrentUser($_SESSION['email']);

  $userID = $currentUser -> getUserID($_SESSION['email']);
  $userReputation = $currentUser -> getReputation();


}
?>
