<?php include('includes/head.php');?>
<?php include('includes/header.php');?>

<div class="page-content my-5">
  <div class="container">
    <div class="offset-md-5">
      <h2>Browse Flagged Tasks</h2>
    </div>
    <div id="display-tasks">
    <?php include_once('includes/php/scripts/display-tasks-flag.php'); ?>
  </div>
  <!--  <div id="remove_row">
        <td><button type="button" name="btn_more_flagged"  id="btn_more" class="btn-success btn form-control" role="button">more</button></td>
   </div> -->
  </div>
</div>
<?php include('includes/footer.php') ?>
<script src="assets/scripts/load-flagged-tasks.js"> </script>
