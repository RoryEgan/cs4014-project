<?php

include_once('includes/php/utils/QueryHelper.class.php');

$qh = new QueryHelper();

if(isset($_POST['remove-task'])){
  echo "remove task";
  $res = $qh -> removeTask($taskID);
  if($res){
    echo "<script>alert('Task Deleted');</script>";
    header('location: index.php');
  }
}

 ?>
