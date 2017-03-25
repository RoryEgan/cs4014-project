<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/task-click.php'); ?>
<?php include_once('includes/php/scripts/claim-task.php'); ?>
<?php include_once('includes/php/scripts/flag-task.php'); ?>
<?php include_once('includes/php/scripts/remove-task.php'); ?>
<?php include_once('includes/php/scripts/complete-task.php'); ?>
<?php include_once('includes/php/scripts/cancel-task.php'); ?>
<?php  if(!isset($_GET['taskID']) || !isset($title)){
    header('location: index.php');
  }

?>

<body>
  <div class="container">
    <div class="offset-md-5">
      <h1 class="">Task Details</h1>
    </div>
    <br><h2><b>Task Title: </b> <?php echo $title?></h2>
    <br><p><b>Description: </b> <?php echo $description?></p>
    <br><p><b>Owner: </b><a href="profile.php?userID=<?php echo $owner?>">Profile</a></p>
    <br><p><b>Paper Type:</b> <?php echo "$docType"; ?></p>
    <br><p><b>Number of Pages: </b> <?php echo "$numPages"; ?></p>
    <br><p><b>Number of words: </b> <?php echo "$numWords"; ?></p>
    <br><p><?php echo "<b>Claim Deadline:</b> $claimDate"; ?> </p>
    <br><p><?php echo "<b>Completion Deadline:</b> $completeDate"; ?></p>
    <br><p><b>Status:</b> <?php echo "$status"; ?></p>
    <br><p><b>Tags:</b> <?php echo "$tag1 $tag2 $tag3 $tag4"; ?></p>
    <br><p><b>Document: </b><a href=" <?php echo "$documentURL"; ?> " download>Get Document</a></p>

    <?php
      if($claimant == $userID && $status == 'Claimed'){
        $modalTitle = 'Complete Task';
        $target = 'complete-modal';
        $includeURL = 'includes/partial/complete-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');

        ?> <br><br> <?php
        $modalTitle = 'Cancel Task';
        $target = 'cancel-modal';
        $includeURL = 'includes/partial/cancel-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
      }
       ?>

    <?php
      if($userID == $owner || $reputation >= 40){
        ?> <br><br> <?php
        $modalTitle = 'Remove Task';
        $target = 'remove-modal';
        $includeURL = 'includes/partial/remove-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
       } ?>

    <?php if($status == "Pending Claim" && $userID != $owner){
      ?> <br><br> <?php
      $modalTitle = 'Claim Task';
      $target = 'claim-modal';
      $includeURL = 'includes/partial/claim-task-modal.php';
      include('includes/php/scripts/dynamic-modal.php');
    }?>
  <?php
  ?> <br><br> <?php
    $modalTitle = 'Flag Task';
    $target = 'flag-modal';
    $includeURL = 'includes/partial/flag-task-modal.php';
    include('includes/php/scripts/dynamic-modal.php');
  ?>
    <br><br>
  </div>
</body>


<?php include('includes/footer.php') ?>
