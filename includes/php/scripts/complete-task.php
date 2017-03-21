<?php
include_once('includes/php/utils/QueryHelper.class.php');

$qh = new QueryHelper();

if(isset($_POST['complete-task'])){


  $qh -> setComplete($taskID);
  
}
 ?>
