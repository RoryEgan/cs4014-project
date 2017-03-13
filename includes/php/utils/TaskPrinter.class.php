<?php

class TaskPrinter{


    function printDefaultTask($task){
      $title = $task -> getTitle();
      $docType = $task -> getDocType();
      $numPages = $task -> getNumPages();
      $numWords = $task -> getNumWords();
      $claimDate = $task -> getClaimDeadline();
      $completeDate = $task -> getCompleteDeadline();
      $description = $task -> getTaskDescription();

      //include('includes/partial/default-task.php');
    }

    function printClaimedTask($task){

    }

    function printFlaggedTask($task, $flag){

    }

    function printMyTask($task){

    }
}


 ?>
