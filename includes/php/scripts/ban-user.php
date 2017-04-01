<?php
  if(isset($_POST['ban-user'])){
    include_once('includes/php/utils/QueryHelper.class.php');
    $qh = new QueryHelper();
    $reason = htmlentities($_POST['reason']);

    $ban = $qh -> insertBannedUser($profileID, $reason);
    if($ban){
      $delete = $qh -> deleteUser($profileID);
      if($delete && $ban){
        header("location: index.php");
      }
    }

  }

 ?>
