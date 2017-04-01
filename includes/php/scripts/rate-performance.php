<?php
  include_once('includes/php/utils/QueryHelper.class.php');
  $qh = new QueryHelper();
  print_r($_POST);
  if(isset($_POST['rate-task'])){
    $satisfaction = htmlentities($_POST['performance']);
    $claimantID = $_POST['claimantID'];
    if($satisfaction == "happy"){
      $qh -> changeReputation($claimantID, 5);
    }
    else{
      $qh -> changeReputation($claimantID, -5);
    }
    $taskID = $_POST['taskID'];
    $qh -> setTaskRated($taskID);
  }

 ?>
