<?php
include('includes/php/utils/TaskRetriever.class.php');
include('includes/php/utils/TaskPrinter.class.php');

  $retriever = new TaskRetriever();
  $taskPrinter = new TaskPrinter();
  $allTasks = $retriever -> getTasks();

  for($i = 0; $i < sizeof($allTasks) && $i < 6; $i++){
    $taskPrinter -> printDefaultTask($allTasks[$i]);
  }
?>
