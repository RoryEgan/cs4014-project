<?php
include('includes/php/utils/QueryHelper.class.php');
include('includes/php/utils/Task.class.php');

$qh = new queryHelper();

  class TaskRetriever{

    function getAllTasks(){
      global $qh;
      $allTasks = $qh -> getJoinedTaskView();
      $allTags = $qh -> getJoinedTagView();
      $allTasksArray = array();


      for($i = 0; $i < sizeof($allTasks); $i++){
        $taskTitle = $allTasks[$i]['Title'];
        $taskID = $allTasks[$i]['TaskID'];
        $ownerID = $allTasks[$i]['User_UserID'];
        $taskType = $allTasks[$i]['TaskTypeVal'];
        $taskDescription = $allTasks[$i]['Description'];
        $numPages = $allTasks[$i]['NumPages'];
        $numWords = $allTasks[$i]['NumWords'];
        $docFormat = $allTasks[$i]['FormatVal'];
        $docType = $allTasks[$i]['DocumentTypeVal'];
        $documentURL = $allTasks[$i]['DocumentURL'];
        $claimDeadline = $allTasks[$i]['Claim'];
        $completeDeadline = $allTasks[$i]['Completion'];
        $subject = $allTasks[$i]['SubjectName'];
        $taskStatus = $allTasks[$i]['StatusVal'];
        $claimantID = $allTasks[0]['ClaimantID'];
        $tags = $this -> getRelevantTags($allTags, $taskID);



        $allTasksArray[$i] = new Task($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $subject, $documentURL,
                                    $tags[0], $tags[1], $tags[2], $tags[3], $claimDeadline, $completeDeadline);
        $allTasksArray[$i] -> setStatus($taskStatus);
        $allTasksArray[$i] -> setOwnerID($ownerID);
        $allTasksArray[$i] -> setTaskID($taskID);
        $allTasksArray[$i] -> setClaimantID($claimantID);
      }

      return $allTasksArray;
    }

    function getTask($taskID){
      global $qh;
      $task = $qh -> getJoinedTask($taskID);
      $allTags = $qh -> getJoinedTagView();

      $taskTitle = $task[0]['Title'];
      $taskID = $task[0]['TaskID'];
      $ownerID = $task[0]['User_UserID'];
      $taskType = $task[0]['TaskTypeVal'];
      $taskDescription = $task[0]['Description'];
      $numPages = $task[0]['NumPages'];
      $numWords = $task[0]['NumWords'];
      $docFormat = $task[0]['FormatVal'];
      $docType = $task[0]['DocumentTypeVal'];
      $documentURL = $task[0]['DocumentURL'];
      $claimDeadline = $task[0]['Claim'];
      $completeDeadline = $task[0]['Completion'];
      $subject = $task[0]['SubjectName'];
      $taskStatus = $task[0]['StatusVal'];
      $claimantID = $task[0]['ClaimantID'];
      $tags = $this -> getRelevantTags($allTags, $taskID);



      $task = new Task($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $subject, $documentURL,
                                  $tags[0], $tags[1], $tags[2], $tags[3], $claimDeadline, $completeDeadline);
      $task -> setStatus($taskStatus);
      $task -> setOwnerID($ownerID);
      $task -> setTaskID($taskID);
      $task -> setClaimantID($claimantID);

      return $task;
    }

    function getRelevantTags($allTags, $taskID){
      $returnTags = array();
      $ctr = 0;

      for($i = 0; $i < sizeof($allTags); $i++){
        if($allTags[$i]['Task_TaskID'] == $taskID){
          $returnTags[$ctr] = $allTags[$i]['Value'];
          $ctr++;
        }
      }
      for($i = sizeof($returnTags); $i < 4; $i++){
        $returnTags[$i] = 'Tag';
      }
      return $returnTags;
    }
  }

 ?>
