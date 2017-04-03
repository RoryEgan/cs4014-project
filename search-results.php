<?php include('includes/head.php');?>
<?php include('includes/header.php');?>

<div class="page-content my-5">
  <div class="container">
    <div class="offset-md-5">
      <h2>Browse Search Results</h2>
    </div>
    <div id="display-tasks-search">
    <?php include_once('includes/php/scripts/display-search-tasks.php'); ?>
  </div>
   <div id="remove_row_search">
        <td><button type="button" name="btn_more_search"  id="btn_more_search" class="btn-success btn form-control" role="button">more</button></td>
   </div>
  </div>
</div>

<?php include('includes/footer.php');?>
