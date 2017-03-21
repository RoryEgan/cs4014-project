<?php
  include_once('includes/php/utils/QueryHelper.class.php');

  $qh = new QueryHelper();

  if(isset($_POST['cancel-task'])){
    $qh -> setPendingClaim($taskID);
    $qh -> changeReputation($userID, -15);
    header("location: task-details.php?taskID=$taskID");
  }
 ?>
