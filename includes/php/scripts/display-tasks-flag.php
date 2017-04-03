<?php
include_once('/var/www/html/CS4014_project/config.php');

include_once(SITE_PATH.'/includes/php/utils/TaskRetriever.class.php');
include_once(SITE_PATH.'/includes/php/utils/TaskPrinter.class.php');

if(isset($_POST['count'])){
  $count = $_POST['count'];
  dynamicPrintTasks($count);
}
else{
  dynamicPrintTasks(0);
}


function dynamicPrintTasks($count){
  $tasksPerPage = 5;
  $start = $count * $tasksPerPage;

  $retriever = new TaskRetriever();
  $taskPrinter = new TaskPrinter();
  $allTasks = $retriever -> getFlaggedTasks($start, $tasksPerPage);

  $size = sizeof($allTasks);

  for($i = 0; $i < sizeof($allTasks); $i++){
    $flags = $retriever -> getRelevantFlags($allTasks[$i] -> getTaskID() );
    $taskPrinter -> printFlaggedTask($allTasks[$i], $flags);
  }


  if($size < $tasksPerPage){
    echo '<p id="stop-loading-flagged" class="offset-md-5"></p>';
  }
}

?>
