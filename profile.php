<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/utils/User.class.php');?>
<?php
$qh = new QueryHelper();
$currentUser = User::getCurrentUser($_SESSION['email']);
$subject = $currentUser -> getSubject();
$email = $currentUser -> getEmailAddress();
$reputation = $currentUser -> getReputation();
$firstname = $currentUser -> getForeName();
$lastname = $currentUser -> getLastname();
?>
<div class="container">
  <div class="row my-5">
    <div class="col-md-3">
      <h2>My Profile</h2>
      <br>Name: <?php echo "$firstname $lastname";?>
      <br><br>Field of expertise:<br> <?php echo "$subject";?>
      <br><br>Email Addrress: <?php echo "$email";?>
      <br><br>Reputation: <?php echo "$reputation";?>
    </div>
    <div class="col-md-9">
      <button id="my-button" type="button" class="btn btn-success mb-5" role="button">
        My Tasks
      </button>
      <button id="claimed-button" type="button" class="btn btn-success mb-5" role="button">
        Claimed Tasks
      </button>
      <div id="display-tasks">
        <?php include_once('includes/php/scripts/display-my-tasks.php'); ?>
      </div>
      <div id="remove_row">
        <td><button type="button" name="btn_more"  id="btn_more" class="btn-success btn form-control" role="button">more</button></td>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php') ?>
