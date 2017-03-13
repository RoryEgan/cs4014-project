<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php
include('includes/php/utils/Database.class.php');
include('includes/php/utils/Validator.class.php');
include('includes/php/utils/QueryHelper.class.php');
$db = new Database();
$val = new Validator();
$qh = new QueryHelper();
?>
<div class="container">
  <div class="row my-5">
      <div class="col-md-3">
        <h2>My Profile</h2>
        <br>Bert
        <br>Computer Science
        <br>email
        <br>Rating
      </div>
      <div class="col-md-9">
        <?php
        $qh = new QueryHelper();
        $num = $qh -> getTasksCount();
          for ($i = 1; $i <= $num; $i++) {
            include('includes/partial/task.php');
          }
          ?>
      </div>
  </div>
</div>
<?php include('includes/footer.php') ?>
