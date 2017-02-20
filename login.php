<?php include('includes/head.php');?>
<?php include('includes/login-header.php');?>
<?php
include('utils/Database.class.php');
include('utils/Validator.class.php');
$db = new Database();


// Submission check?
//if(! isset($_POST['signUpButton'])) return;
// Honeypot
//if( ! $_POST['contact'] == '') return;

// Logic here!

//header('Location: thank-you.php');
//exit();



if (isset($_POST['loginSubmitButton'])) {
  $val = new Validator();
  $inputEmail = $db->quote($_POST['signInEmail']);
  $inputPassword = $db->quote($_POST['signInPassword']);
  $connection = $db->connect();
  if($val -> isValidEmail($inputEmail) && $val -> isValidPassword($inputPassword)) {
    echo "passed validation";
    if ($connection) {
      $sql = "SELECT *
      FROM User
      WHERE EmailAddress = '$inputEmail' AND Password = '$inputPassword';";
      $res = $db -> select($sql);
      if (count($res) >= 1) {
        echo "should be going to index page";
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

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-6">
        <div class="login-boundry my-5">
          <h2 class="my-3">Sign up!</h2>
          <form class="form" action="login.php" method="post">
            <div class="form-group">
              <div id="fNameDiv" class="form-inline">
                <input id="signUpFirstName" class="form-control my-2"
                type="text" name="" value="" placeholder="First Name" onblur="validateFirstName()" required/>
              </div>
              <div id="lNameDiv" class="form-inline">
                <input id="signUpLastName" class="form-control my-2" type="text" name="" value="" placeholder="Last Name" onblur="validateLastName()" required/>
              </div>
              <div id="emailSignUpGroup">
                <input id="signUpEmail" class="form-control my-2" type="email" onblur="validateEmail()" placeholder="Email" required/>
              </div>
              <input id="signUpID" type="text" class="form-control my-2" placeholder="Student ID" required/>
              <select class="form-control my-2">
                <option selected hidden>Subject / Discipline</option>
                <option value="Biology">Biology</option>
                <option value="Computer science">Computer Science</option>
                <option value="Physics">Physics</option>
                <option value="Engineering">Engineering</option>
                <option value="Chemistry">Chemistry</option>
              </select>
              <input id="signUpPassword" type="password" class="form-control my-2" placeholder="Password"/>
              <input id="signUpPasswordConfirm" type="password" class="form-control my-2" placeholder="Confirm Password"/>
              <input type="submit" class="btn btn-default" value="Sign Up" name="signUpButton" role="button"/>
              <div class="input-field">
                <input type="text" name="contact" value="" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include('includes/footer.php');?>
