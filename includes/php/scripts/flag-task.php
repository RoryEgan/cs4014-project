<?php
include_once('includes/php/utils/QueryHelper.class.php');

$qh = new QueryHelper();


if(isset($_POST['flag-task'])){
  $complaint = htmlentities($_POST['complaint']);
  $qh -> insertFlag($taskID, $complaint);
}
 ?>
