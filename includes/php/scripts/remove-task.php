<?php

include_once('includes/php/utils/QueryHelper.class.php');

$qh = new QueryHelper();

if(isset($_POST['remove-task'])){
  $res = $qh -> removeTask($taskID);
  if($res){
    header('location: index.php');
  }
}

 ?>
