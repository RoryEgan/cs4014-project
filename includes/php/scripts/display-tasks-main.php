<?php
include_once('/var/www/html/CS4014_project/config.php');

include_once(SITE_PATH.'/includes/php/utils/TaskRetriever.class.php');
include_once(SITE_PATH.'/includes/php/utils/TaskPrinter.class.php');
include_once(SITE_PATH.'/includes/php/utils/QueryHelper.class.php');

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

  $qh = new QueryHelper();
  $clickInfo = $qh->getClickInfo($_SESSION['userID']);

  if(sizeof($clickInfo) >= 100 && false){
    //implement algorithm to generate personalized tasks
    //
    //Ideas on how to implement:
    //  -
    //  -use clickInfo to find top 3-5 most viewed tags and subjects
    //  -Query database with something along the lines of:
    //    SELECT * FROM JoinedTask
    //    WHERE $subject1 = JoinedTask.SubjectName
    //    UNION
    //    SELECT * FROM JoinedTask
    //    WHERE $tag1 = JoinedTag.Tag
    //    ...
    //    LIMIT 0,5;
    //  -(perhaps use a limit for each select)
    //  -
    //
  }
  else{
    $allTasks = $retriever -> getTasksMain($start, $tasksPerPage);

    $size = sizeof($allTasks);



    for($i = 0; $i < sizeof($allTasks); $i++){
      $taskPrinter -> printDefaultTask($allTasks[$i]);
    }


    if($size < $tasksPerPage){
      echo '<p id="stop-loading-main" class="offset-md-5"></p>';
    }
  }
}

?>
