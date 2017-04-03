<?php

include_once('includes/php/utils/TaskRetriever.class.php');
include_once('includes/php/utils/User.class.php');
include_once('includes/php/utils/DateFormatConverter.class.php');
include_once('includes/php/util/QueryHelper.class.php');

if(isset($_GET['taskID'])){
  $taskID = $_GET['taskID'];
  $retriever = new TaskRetriever();

  $task = $retriever -> getTask($taskID);

  //This is the information required for the task-details page
  $title = $task -> getTaskTitle();
  $description = $task -> getTaskDescription();
  $docType = $task -> getDocType();
  $taskType = $task->getTaskType();
  $numWords = $task -> getNumWords();
  $numPages = $task -> getNumPages();
  $docFormat = $task -> getDocFormat();
  $document = $task -> getDocument();
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

  $converter = new DateFormatConverter();
  $claimDate = $converter -> convert($claimDate);
  $completeDate = $converter -> convert($completeDate);

  $currentUser = User::getUser($_SESSION['userID']);

  $userID = $_SESSION['userID'];
  $userReputation = $currentUser -> getReputation();

  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
  if(!$pageWasRefreshed){
    $qh = new QueryHelper();
    $qh -> insertClick($userID, $taskID);
  }

}
?>
