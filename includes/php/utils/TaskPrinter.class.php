<?php
include_once('/var/www/html/CS4014_project/config.php');
include_once(SITE_PATH . '/includes/php/utils/DateFormatConverter.class.php');

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

      include(SITE_PATH . '/includes/partial/default-task.php');
    }

    function printClaimedTask($task){

    }

    function printFlaggedTask($task, $flag){

    }

    function printMyTask($task){

    }
}


 ?>
