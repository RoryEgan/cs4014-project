<?php include('includes/head.php');?>
<?php include('includes/login-header.php');?>
<?php
include('utils/Database.class.php');
include('utils/Validator.class.php');
$db = new Database();
$val = new Validator();


// Honeypot
if( ! $_POST['contact'] == '') return;




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

// Submission check?
if(isset($_POST['signUpButton'])) {
  echo "sign up button pressed";
  $firstName = $db->quote(trim($_POST['signUpFirstName']));
  $lastName = $db->quote(trim($_POST['signUpLastName']));
  $signUpEmail = $db->quote(trim(strtolower($_POST['signUpEmail'])));
  $StudentID = $db->quote(trim($_POST['signUpID']));
  $subject = $db->quote($_POST['signUpSubject']);
  $signUpPassword = $db->quote(trim($_POST['signUpPassword']));
  $passwordConfirm = $db->quote(trim($_POST['signUpPasswordConfirm']));
  $connection = $db->connect();

  //REQUIRED: -select operation to get subject ID from chosen subject.
  //          -password encryption.
  //          -ensure studentIDs entered are unique
  //          -ensure emails are unique
  //          -ensure banned users are not trying to sign up again (check email and studentID)
  //          -connection through SSL for login/ sign up
  if($val->isValidSignUp($firstName, $lastName, $signUpEmail, $StudentID, $subject, $signUpPassword, $passwordConfirm)){
    if($connection){
      $insertSql = "INSERT INTO   `CS4014_project_database`.`User` (
                            `StudentID` ,
                            `SubjectID` ,
                            `ForeName` ,
                            `SurName` ,
                            `EmailAddress` ,
                            `Password` ,
                            `Reputation` ,
                            `IsMod`
                            )
                            VALUES (
                            '$StudentID',  '1',  '$firstName',  '$lastName',  '$signUpEmail',  '$signUpPassword',  '0',  '0'
                          );";

      $result = $db -> query($insertSql);

      if($result){
        header('Location: thank-you.php');
        exit();
      }
      else{
        echo "failed sign up";
      }
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
                <input id="signUpFirstName" class="form-control my-2" type="text" name="signUpFirstName" value="" placeholder="First Name" onblur="validateFirstName()" required/>
              </div>
              <div id="lNameDiv" class="form-inline">
                <input id="signUpLastName" name="signUpLastName" class="form-control my-2" type="text" value="" placeholder="Last Name" onblur="validateLastName()" required/>
              </div>
              <div id="emailSignUpGroup">
                <input id="signUpEmail" name="signUpEmail" class="form-control my-2" type="email" onblur="validateEmail()" placeholder="Email" required/>
              </div>
              <input id="signUpID" name="signUpID" type="text" class="form-control my-2" placeholder="Student ID" required/>
              <select class="form-control my-2" name="signUpSubject">
                <option selected hidden>Subject / Discipline</option>
                <option value="Biology">Biology</option>
                <option value="Computer science">Computer Science</option>
                <option value="Physics">Physics</option>
                <option value="Engineering">Engineering</option>
                <option value="Chemistry">Chemistry</option>
              </select>
              <div id="passwordGroup">
                <input id="signUpPassword" name="signUpPassword" type="password" class="form-control my-2" placeholder="Password" onblur="validatePassword()"/>
              </div>
              <div id="passwordConfirmGroup">
                <input id="signUpPasswordConfirm" name="signUpPasswordConfirm" type="password" class="form-control my-2" placeholder="Confirm Password" onblur="confirmPassword()"/>
              </div>
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
