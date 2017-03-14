<?php

  class TaskRetriever{
    function getAllTasks(){
      $qh = new queryHelper();
      $allTasks = $qh -> getJoinedTaskView();
      $allTags = $qh -> getJoinedTagView();
      $allTasksArray = array();


      for($i = 0; $i < sizeof($allTasks); $i++){
        $taskTitle = $allTasks[$i]['Title'];
        $taskID = $allTasks[$i]['TaskID'];
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
        $tags = $this -> getRelevantTags($allTags, $taskID);



        $allTasksArray[$i] = new Task($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $subject, $documentURL,
                                    $tags[0], $tags[1], $tags[2], $tags[3], $claimDeadline, $completeDeadline);
        $allTasksArray[$i] -> setStatus($taskStatus);
        $allTasksArray[$i] -> setOwnerID(1);
      }

      return $allTasksArray;
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
      for($i = sizeof($returnTags)-1; $i < 4; $i++){
        $returnTags[$i] = 'Tag';
      }
      return $returnTags;
    }
  }

 ?>
