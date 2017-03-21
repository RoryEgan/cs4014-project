<?php
include_once('/var/www/html/CS4014_project/config.php');

include(SITE_PATH.'/includes/php/utils/TaskRetriever.class.php');
include(SITE_PATH.'/includes/php/utils/TaskPrinter.class.php');

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
  $allTasks = $retriever -> getTasksMain($start, $tasksPerPage);

  $size = sizeof($allTasks);

  for($i = 0; $i < sizeof($allTasks); $i++){
    $taskPrinter -> printDefaultTask($allTasks[$i]);
  }


  if($size < $tasksPerPage){
    echo '<p id="stop-loading-main" class="offset-md-5"></p>';
  }
}

?>
