<?php
include('includes/php/utils/Database.class.php');
include('includes/php/utils/Validator.class.php');
$db = new Database();
$val = new Validator();


if (isset($_POST['loginSubmitButton'])) {
  $signInEmail = $db->quote(strtolower($_POST['signInEmail']));
  $signInPassword = $db->quote(trim($_POST['signInPassword']));
  $connection = $db->connect();
  if($val -> isValidEmail($signInEmail) && $val -> isValidPassword($signInPassword)) {
    if ($connection) {
      $sql = "SELECT *
      FROM User
      WHERE EmailAddress = '$signInEmail' AND Password = '$signInPassword';";
      $res = $db -> select($sql);
      if (count($res) >= 1) {
        header("Location: index.php");
        exit();
      }
      else {
        echo "<script>alert('Email or password incorrect');</script>";
      }
      mysqli_close($connection);
    }
  }
}

?>
