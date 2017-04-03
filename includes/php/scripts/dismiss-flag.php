<?php
include_once('includes/php/utils/QueryHelper.class.php');

if(isset($_POST['dismiss-flag'])){
  $taskID = $_POST['taskID'];

  $qh = new QueryHelper();
  $res = $qh -> deleteTaskFlag($taskID);
  echo "RESULT: $res";

  if($res){
    header('location: flagged-tasks.php');
  }
}

 ?>
