<?php
  include_once('/var/www/html/CS4014_project/config.php');
  include_once(SITE_PATH . '/includes/php/utils/TaskRetriever.class.php');
  include_once(SITE_PATH . '/includes/php/utils/TaskPrinter.class.php');

if(isset($_POST['dynamic-search'])){
  $searchQuery = htmlentities($_POST['dynamic-search']);

  $retriever = new TaskRetriever();
  $allTasks = $retriever -> getSearchResults($searchQuery, 0, 5);

  if(sizeof($allTasks) == 0){
    echo "No results for search term: \"$searchQuery\"";
  }
  else{
    $printer = new TaskPrinter();
    for($i = 0; $i < sizeof($allTasks); $i++){
      $printer -> printDynamicSearchTask($allTasks[$i]);
    }
  }
}

?>
