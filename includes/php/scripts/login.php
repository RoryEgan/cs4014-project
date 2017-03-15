<?php
include('includes/php/utils/Validator.class.php');
include('includes/php/utils/QueryHelper.class.php');
$db = new Database();
$val = new Validator();
$qh = new QueryHelper();

session_start();
session_destroy();


if (isset($_POST['loginSubmitButton'])) {
  $signInEmail = $db->quote(strtolower($_POST['signInEmail']));
  $signInPassword = $db->quote(trim($_POST['signInPassword']));
  $connection = $db->connect();
  if($val -> isValidEmail($signInEmail) && $val -> isValidPassword($signInPassword)) {
    if ($connection) {

      $retrievedSalt = $qh -> getPasswordSalt($signInEmail);

      $saltyPassword = $signInPassword . $retrievedSalt;
      $hashedPassword = hash('sha256', $saltyPassword);

      $res = $qh -> getUser($signInEmail, $hashedPassword);


      if (!$res) {
        echo "<script>alert('Email or password incorrect');</script>";
      }
      else {
          session_start();
          $_SESSION['email'] = $signInEmail;
          header("Location: index.php");
          mysqli_close($connection);
          unset($connection);
          exit();
      }
    }
  }
  else{
    echo "<script>alert('Email or password invalid');</script>";;
  }
}

?>
