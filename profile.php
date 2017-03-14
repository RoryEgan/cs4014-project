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
        <button id="my-button" type="button" class="btn btn-outline-secondary mb-5" role="button">
            My Tasks
        </button>
        <button id="claimed-button" type="button" class="btn btn-outline-secondary mb-5" role="button">
            Claimed Tasks
        </button>
        <?php
        $qh = new QueryHelper();
        $num = $qh -> getTasksCount();
          for ($i = 1; $i <= $num; $i++) {
            include('includes/partial/task.php');
            // $taskPrinter = new TaskPrinter();
            // include('includes/php/utils/Task.class.php');
            // $task = new Task();
            // $taskPrinter -> printDefaultTask($task);
          }
          ?>
      </div>
  </div>
</div>
<?php include('includes/footer.php') ?>
