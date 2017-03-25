<?php
  if(isset($_POST['ban-user'])){
    include_once('includes/php/utils/QueryHelper.class.php');
    $qh = new QueryHelper();

    $res = $qh -> deleteUser($profileID);
    if($res){
      header("location: index.php");
    }
  }

 ?>
