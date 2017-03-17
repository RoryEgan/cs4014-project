<?php

include_once('includes/php/utils/DateFormatConverter.class.php');

class TaskPrinter{


    function printDefaultTask($task){
      $taskID = $task -> getTaskID();
      $title = $task -> getTaskTitle();
      $docType = $task -> getDocType();
      $numPages = $task -> getNumPages();
      $numWords = $task -> getNumWords();
      $claimDate = $task -> getClaimDeadline();
      $completeDate = $task -> getCompleteDeadline();
      $description = $task -> getTaskDescription();
      $converter = new DateFormatConverter();
      $claimDate = $converter -> convert($claimDate);
      $completeDate = $converter -> convert($completeDate);

      include('includes/partial/default-task.php');
    }

    function printClaimedTask($task){

    }

    function printFlaggedTask($task, $flag){

    }

    function printMyTask($task){

    }
}


 ?>
