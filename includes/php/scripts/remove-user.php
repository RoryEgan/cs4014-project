<?php
include_once('includes/php/utils/QueryHelper.class.php');
$qh = new QueryHelper();
if(isset($_POST['ban-user']) || isset($_POST['remove-profile'])){
  if(isset($_POST['ban-user'])){
    $reason = htmlentities($_POST['reason']);
    $ban = $qh -> insertBannedUser($profileID, $reason);
  }

  $delete = $qh -> deleteUser($profileID);
  $result = $qh -> handleClaimedTasksOnUserDelete($profileID);

  if($ban){
    header("location: index.php");
  }
  else{
    header("location: login.php");
  }
}

 ?>
