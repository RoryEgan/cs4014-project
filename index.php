<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/new-task.php');?>
<div class="page-content my-5">
  <div class="container">

    <section>
      <?php
        $target = "task-modal";
        $modalTitle = 'New Task';
        $includeURL = 'includes/partial/new-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
      ?>
    </section>
    <div id="display-tasks">
    <?php include_once('includes/php/scripts/display-tasks-main.php'); ?>
  </div>
    <div id="remove_row">
        <td><button type="button" name="btn_more"  id="btn_more" class="btn-success btn form-control" role="button">more</button></td>
   </div>
  </div>
</div>

<?php include('includes/footer.php');?>
<script src="assets/scripts/load-tasks-main.js"> </script>
