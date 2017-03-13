<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
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
          for ($i = 1; $i <= 10; $i++) {
            include('includes/partial/task.php');
          }?>
      </div>
  </div>
</div>
<?php include('includes/footer.php') ?>
