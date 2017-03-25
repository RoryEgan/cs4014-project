<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include('includes/php/utils/TaskRetriever.class.php');?>
<?php include('includes/php/utils/TaskPrinter.class.php');?>


<div class="container">
  <?php
    if(isset($_POST['submit-search'])){
      $searchQuery = htmlentities($_POST['search-query']);

      $retriever = new TaskRetriever();
      $allTasks = $retriever -> getSearchResults($searchQuery);

      if(sizeof($allTasks) == 0){
        echo "No results for search term: \"$searchQuery\"";
      }
      else{
        $printer = new TaskPrinter();
        for($i = 0; $i < sizeof($allTasks); $i++){
          $printer -> printDefaultTask($allTasks[$i]);
        }
      }

    }

   ?>
</div>

<?php include('includes/footer.php');?>
