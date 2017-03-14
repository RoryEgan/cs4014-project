<?php

class TaskPrinter{


    function printDefaultTask($task){
      $title = $task -> getTaskTitle();
      $docType = $task -> getDocType();
      $numPages = $task -> getNumPages();
      $numWords = $task -> getNumWords();
      $claimDateOriginal = $task -> getClaimDeadline();
      $completeDateOriginal = $task -> getCompleteDeadline();
      $description = $task -> getTaskDescription();
      if($claimDateOriginal != '' && $completeDateOriginal != ''){
        $myDateTime = DateTime::createFromFormat('Y-m-d', $claimDateOriginal);
        $claimDate = $myDateTime->format('d/m/Y');
        $myDateTime = DateTime::createFromFormat('Y-m-d', $completeDateOriginal);
        $completeDate = $myDateTime->format('d/m/Y');
      }


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
