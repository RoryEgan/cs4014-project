<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/task-click.php'); ?>
<?php include_once('includes/php/scripts/claim-task.php'); ?>
<?php include_once('includes/php/scripts/flag-task.php'); ?>
<?php  if(!isset($_GET['taskID'])){
    header('location: index.php');
  }
?>

<body>
  <div class="container">
    <div class="offset-md-5">
      <h1 class="">Task Details</h1>
    </div>
    <br><br><h2><b>Task Title:</b> <?php echo $title?></h2>
    <br><br><p><b>Description:</b> <?php echo $description?></p>
    <br><br><p><b>Paper Type:</b> <?php echo "$docType"; ?></p>
    <br><br><p><b>Number of Pages:</b> <?php echo "$numPages"; ?></p>
    <br><br><p><b>Number of words:</b> <?php echo "$numWords"; ?></p>
    <br><br><p><?php echo "<b>Claim Deadline:</b> $claimDate"; ?> </p>
    <br><br><p><?php echo "<b>Completion Deadline:</b> $completeDate"; ?></p>
    <br><br><p><b>Status:</b> <?php echo "$status"; ?></p>
    <br><br><p><b>Tags:</b> <?php echo "$tag1 $tag2 $tag3 $tag4"; ?></p>
    <br><br><p><b>Document:</b><a href=" <?php echo "$documentURL"; ?> " download>Get Document</a></p>

    <?php
      if($claimant == $userID){
        echo '<br><br><input type="button" class="btn btn-default" value="Request Full File" name="signUpButton" role="button"/>';
        echo '<br><br><input type="button" class="btn btn-default" value="Mark Complete" name="signUpButton" role="button"/>';
        echo '<br><br><input type="button" class="btn btn-default" value="Cancel Task" name="signUpButton" role="button"/>';
      }
       ?>

    <?php
      if($userID == $owner || $userReputation >= 40){
         echo '<br><br><input type="button" class="btn btn-default" value="Remove Task" name="signUpButton" role="button"/>';
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
