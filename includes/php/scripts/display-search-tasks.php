<?php
session_start();
include_once('/var/www/html/CS4014_project/config.php');
include_once(SITE_PATH.'/includes/php/utils/TaskRetriever.class.php');
include_once(SITE_PATH.'/includes/php/utils/TaskPrinter.class.php');

if(isset($_GET['submit-search']) || isset($_GET['count'])){
  $searchQuery = htmlentities($_GET['search-query']);
  if(isset($_GET['count'])){
    $count = $_GET['count'];
    printMyTasks($count, $searchQuery);
  }
  else{
    printMyTasks(0, $searchQuery);
  }

}



function printMyTasks($count, $searchQuery){
  $tasksPerPage = 5;
  $start = $count * $tasksPerPage;

  $retriever = new TaskRetriever();
  $allTasks = $retriever -> getSearchResults($searchQuery, $start, $tasksPerPage);

  $printer = new TaskPrinter();
  for($i = 0; $i < sizeof($allTasks); $i++){
    $printer -> printDefaultTask($allTasks[$i]);
  }

  $size = sizeof($allTasks);

  if($count == 0 && $size == 0){
    echo '<p id="stop-loading-search" class="offset-md-5">'. "No results for search term: \"$searchQuery\"" . '</p>';
  }
  else if($size < 5){
    echo '<p id="stop-loading-search" class="offset-md-5">No More Tasks To Show.</p>';
  }


}
?>
