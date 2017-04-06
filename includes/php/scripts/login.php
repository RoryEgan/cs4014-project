<script type="text/javascript">
function passwordFailed() {

  var password = document.getElementById('signInPassword');
  var passwordGroup = document.getElementById('passwordSignInGroup');

  passwordGroup.className = "form-group has-danger";
  password.className = "form-control form-control-danger";
}
function emailFailed() {

  var email = document.getElementById('signInEmail');
  var emailGroup = document.getElementById('emailSignInGroup');

  emailGroup.className = "from-group has-danger";
  email.className = "form-control form-control-danger";

}
</script>

<?php
include_once('includes/php/utils/Validator.class.php');
include_once('includes/php/utils/QueryHelper.class.php');
include_once('includes/php/utils/Database.class.php');


session_start();

if(isset($_SESSION['userID'])){
  session_destroy();
}

$db = new Database();
$val = new Validator();
$qh = new QueryHelper();

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
          echo '<script type="text/javascript">',
          'emailFailed();',
          '</script>';
        }
        else{
          session_start();
          $_SESSION['userID'] = $qh -> getUserIDFromEmail($signInEmail);
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
      '</script>';
    }
  }
  else {
    echo '<script type="text/javascript">',
    'emailFailed();',
    '</script>';
  }
}

?>
