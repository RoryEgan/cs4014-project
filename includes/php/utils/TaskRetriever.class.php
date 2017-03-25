<?php
include_once('/var/www/html/CS4014_project/config.php');
include_once(SITE_PATH . '/includes/php/utils/QueryHelper.class.php');
include_once(SITE_PATH . '/includes/php/utils/Task.class.php');
include_once(SITE_PATH . '/includes/php/utils/Flag.class.php');

$qh = new queryHelper();

  class TaskRetriever{

    function getTasksMain($start, $number){
      global $qh;
      $taskTable = $qh -> getTasksMain($start, $number);
      $allTasksArray = array();


      for($i = 0; $i < sizeof($taskTable); $i++){
        $allTasksArray[$i] = $this -> initializeTask($taskTable, $i);
      }

      return $allTasksArray;
    }

    function getMyTasks($start, $number) {
      global $qh;
      $taskTable = $qh -> getMyTasks($start, $number);
      $allTasksArray = array();


      for($i = 0; $i < sizeof($taskTable); $i++){
        $allTasksArray[$i] = $this -> initializeTask($taskTable, $i);
      }

      return $allTasksArray;
    }

    function getFlaggedTasks($start, $number){
      global $qh;
      $taskTable = $qh -> getFlaggedTasks($start, $number);
      $allTasksArray = array();


      for($i = 0; $i < sizeof($taskTable); $i++){
        $allTasksArray[$i] = $this -> initializeTask($taskTable, $i);
      }

      return $allTasksArray;
    }

    function getClaimedTasks($start, $number) {
      global $qh;
      $taskTable = $qh -> getClaimedTasks($start, $number);
      $allTasksArray = array();


      for($i = 0; $i < sizeof($taskTable); $i++){
        $allTasksArray[$i] = $this -> initializeTask($taskTable, $i);
      }

      return $allTasksArray;
    }

    function getSearchResults($searchQuery){
      global $qh;
      $taskTable = $qh -> search($searchQuery);
      $allTasksArray = array();

      for($i = 0; $i < sizeof($taskTable); $i++){
        $allTasksArray[$i] = $this -> initializeTask($taskTable, $i);
      }

      return $allTasksArray;
    }

    function getTask($taskID){
      global $qh;
      $taskTable = $qh -> getJoinedTask($taskID);

      $task = $this -> initializeTask($taskTable, 0);

      return $task;
    }

    function getRelevantTags($taskID){
      global $qh;

      $tags = $qh -> getJoinedTags($taskID);

      $returnTags = array();

      for($i = 0; $i < sizeof($tags); $i++){
          $returnTags[$i] = $tags[$i]['Value'];
      }
      for($i = sizeof($returnTags); $i < 4; $i++){
        $returnTags[$i] = 'Tag';
      }
      return $returnTags;
    }

    function getRelevantFlags($taskID){
      global $qh;

      $flags = $qh -> getFlags($taskID);

      $returnFlags = array();

      for($i = 0; $i < sizeof($flags); $i++){
        $returnFlags[$i] = new Flag($flags[$i]['FlagID'], $flags[$i]['Task_TaskID'], $flags[$i]['Complaint']);
      }
      return $returnFlags;
    }

    private function initializeTask($tasks, $index){
      $taskTitle = $tasks[$index]['Title'];
      $taskID = $tasks[$index]['TaskID'];
      $ownerID = $tasks[$index]['User_UserID'];
      $taskType = $tasks[$index]['TaskTypeVal'];
      $taskDescription = $tasks[$index]['Description'];
      $numPages = $tasks[$index]['NumPages'];
      $numWords = $tasks[$index]['NumWords'];
      $docFormat = $tasks[$index]['FormatVal'];
      $docType = $tasks[$index]['DocumentTypeVal'];
      $documentURL = $tasks[$index]['DocumentURL'];
      $claimDeadline = $tasks[$index]['Claim'];
      $completeDeadline = $tasks[$index]['Completion'];
      $subject = $tasks[$index]['SubjectName'];
      $taskStatus = $tasks[$index]['StatusVal'];
      $claimantID = $tasks[$index]['ClaimantID'];
      $tags = $this -> getRelevantTags($taskID);



      $task = new Task($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $subject, $documentURL,
                                  $tags[0], $tags[1], $tags[2], $tags[3], $claimDeadline, $completeDeadline);
      $task -> setStatus($taskStatus);
      $task -> setOwnerID($ownerID);
      $task -> setTaskID($taskID);
      $task -> setClaimantID($claimantID);

      return $task;
    }
  }

 ?>
