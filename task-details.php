<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include('includes/php/scripts/task-click.php'); ?>

<body>
  <div class="container">
    <h1 class="">Task Details</h1>
    <br><br><h2><b>Task Title:</b> <?php echo $title?></h2>
    <br><br><p><b>Description:</b> <?php echo $description?></p>
    <br><br><p><b>Paper Type:</b> <?php echo "$docType"; ?></p>
    <br><br><p><b>Number of Pages:</b> <?php echo "$numPages"; ?></p>
    <br><br><p><b>Number of words:</b> <?php echo "$numWords"; ?></p>
    <br><br><p><?php echo "<b>Claim Deadline:</b> $claimDate"; ?> </p>
    <br><br><p><?php echo "<b>Completion Deadline:</b> $completeDate"; ?></p>
    <br><br><p><b>Status:</b> <?php echo "$status"; ?></p>

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

    <?php if($status == "Pending Claim"){
        echo '<br><br><input type="button" class="btn btn-default" value="Claim Task" name="signUpButton" role="button"/>';
    }?>
    <br><br><input type="button" class="btn btn-default" value="Flag Task" name="signUpButton" role="button"/><br><br>
  </div>
</body>


<?php include('includes/footer.php') ?>
