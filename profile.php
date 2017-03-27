<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/utils/User.class.php');

if(!isset($_GET['userID'])){
  header("location: index.php");
}
      include_once('includes/php/scripts/profile-info.php');
      include_once('includes/php/scripts/ban-user.php');
?>
<div class="container">
  <div class="row my-5">
    <div class="col-md-3">
      <h2>My Profile</h2>
      <br>Name: <?php echo "$profileFirstname $profileLastname";?>
      <br><br>Field of expertise:<br> <?php echo "$profileSubject";?>
      <br><br>Email Addrress: <?php echo "$profileEmailAddress";?>
      <br><br>Reputation: <?php echo "$profileReputation";?>
      <?php
        if($reputation >= 40){
          ?> <br><br> <?php
          $modalTitle = 'Ban User';
          $target = 'ban-modal';
          $includeURL = 'includes/partial/ban-user-modal.php';
          include('includes/php/scripts/dynamic-modal.php');
         }

       ?>
       <?php
         if($userID === $profileID){
           ?> <br><br> <?php
           $modalTitle = 'Remove Profile';
           $target = 'remove-profile';
           $includeURL = 'includes/partial/remove-profile-modal.php';
           include('includes/php/scripts/dynamic-modal.php');
          }

        ?>
    </div>
    <div class="col-md-9">
      <button id="my-button" type="button" class="btn btn-outline mb-5" role="button">
        My Tasks
      </button>
      <button id="claimed-button" type="button" class="btn btn-outline mb-5" role="button">
        Claimed Tasks
      </button>
      <div id="display-tasks">
        <?php include_once('includes/php/scripts/display-my-tasks.php'); ?>
      </div>
      <div id="wrap-more-button">
        <div id="remove_row">
          <td><button type="button" name="btn_more_profile" id="btn_more_profile" class="btn-success btn form-control" role="button">more</button></td>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php') ?>
