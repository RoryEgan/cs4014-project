<?php include('includes/head.php');?>
<?php include('includes/header.php');?>


<div class="container">
  <?php
    if(isset($_POST['submit-search'])){
      $searchQuery = htmlentities($_POST['search-query']);
      echo "No results for search term: \"$searchQuery\"";

    }

   ?>
</div>

<?php include('includes/footer.php');?>
