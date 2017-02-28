<?php
include('includes/php/utils/Database.class.php');
include('includes/php/utils/Validator.class.php');
include('includes/php/utils/QueryHelper.class.php');
$db = new Database();
$val = new Validator();
$qh = new QueryHepler();


if (isset($_POST['loginSubmitButton'])) {
  $signInEmail = $db->quote(strtolower($_POST['signInEmail']));
  $signInPassword = $db->quote(trim($_POST['signInPassword']));
  $connection = $db->connect();
  if($val -> isValidEmail($signInEmail) && $val -> isValidPassword($signInPassword)) {
    if ($connection) {

      $retrievedSalt = $qh -> getPasswordSalt($signInEmail);

      $saltyPassword = $signUpPassword . $retrievedSalt;
      $hashedPassword = password_hash($saltyPassword, PASSWORD_BCRYPT);

      $res = $qh -> getUser($signInEmail, $hashedPassword);

      
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
