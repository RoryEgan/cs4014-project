<script type="text/javascript">
function passwordFailed() {

  var password = document.getElementById('signInPassword');
  var passwordGroup = document.getElementById('passwordSignInGroup');

  passwordGroup.className = "form-group has-danger";
  password.className = "form-control form-control-danger";
  console.log("Javascript password failed.");

}
function emailFailed() {

  var email = document.getElementById('signInEmail');
  var emailGroup = document.getElementById('passwordSignInGroup');

  emailGroup.className = "from-group has-danger";
  email.className = "form-control form-control-danger";
  console.log("Javascript email failed.");

}
</script>

<?php
include_once('includes/php/utils/Validator.class.php');
include_once('includes/php/utils/QueryHelper.class.php');
include_once('includes/php/utils/QueryHelper.class.php');

$db = new Database();
$val = new Validator();
$qh = new QueryHelper();

session_start();
session_destroy();


if (isset($_POST['loginSubmitButton'])) {
  $signInEmail = $db->quote(strtolower($_POST['signInEmail']));
  $signInPassword = $db->quote(trim($_POST['signInPassword']));
  $connection = $db->connect();
  if($val -> isValidEmail($signInEmail)) {
    if($val -> isValidPassword($signInPassword)) {
      if ($connection) {

        $retrievedSalt = $qh -> getPasswordSalt($signInEmail);

        $saltyPassword = $signInPassword . $retrievedSalt;
        $hashedPassword = hash('sha256', $saltyPassword);

        $res = $qh -> getUser($signInEmail, $hashedPassword);
        if(!$res){
          echo "<script>alert('Sign in failure');</script>";
        }
        else{
          session_start();
          $_SESSION['email'] = $signInEmail;
          header("Location: index.php");
          mysqli_close($connection);
          unset($connection);
          exit();
        }
      }
    }
    else {
      echo '<script type="text/javascript">',
      'passwordFailed();',
      '</script>'
      ;
      echo "password failed";
    }
  }
  else {
    echo '<script type="text/javascript">',
    'emailFailed();',
    '</script>'
    ;
    echo "email failed";
  }
}

?>
