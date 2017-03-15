<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php
include('includes/php/utils/Validator.class.php');
include('includes/php/utils/QueryHelper.class.php');
include('includes/php/utils/User.class.php');
$db = new Database();
$val = new Validator();
$qh = new QueryHelper();
$currentUser = User::getCurrentUser($_SESSION['email']);
$subject = $currentUser -> getSubject();
$email = $currentUser -> getEmailAddress();
$reputation = $currentUser -> getReputation();
?>
<div class="container">
  <div class="row my-5">
      <div class="col-md-3">
        <h2>My Profile</h2>
        <br>Bert
        <br><br>Field of expertise:<br> <?php echo "$subject";?>
        <br><br>Email Addrress: <?php echo "$email";?>
        <br><br>Reputation: <?php echo "$reputation";?>
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
