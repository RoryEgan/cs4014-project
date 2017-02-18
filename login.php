<?php include('includes/head.php');?>
<?php include('includes/login-header.php');?>
<?php
  $host = "localhost";
  $username = ""; //enter phpmyadmin name here.
  $password = ""; //enter phpmyadmin password here.
  $db = "CS4014_project_database";


  if(isset($_POST['loginSubmitButton'])){
    $email = $_POST['signInEmail'];
    $userPassword = $_POST['signInPassword'];


    $connection = mysql_connect($host, $username, $password);
    if($connection){
      mysql_select_db($db);

      $sql = "SELECT *
              FROM User
              where EmailAddress='".$email."' AND Password='".$userPassword."';";



      $res = mysql_query($sql);

      if(mysql_num_rows($res) >= 1){
        header("Location: index.php");
        exit();
      }
      else{
        echo "<script>alert('invalid login');</script>";
      }

      mysql_close($connection);
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
                type="text" name="" value="" placeholder="First Name" onblur="validateFirstName()"/>
              </div>
              <div id="lNameDiv" class="form-inline">
                <input id="signUpLastName" class="form-control my-2" type="text" name="" value="" placeholder="Last Name" onblur="validateLastName()"/>
              </div>
              <div class="">
                <input id="signUpEmail" class="form-control my-2" type="email" placeholder="Email"/>
              </div>
              <input id="signUpID" type="text" class="form-control my-2" placeholder="Student ID"/>
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
              <input type="submit" class="btn btn-default my-2" value="Sign Up">
              <p>All fields are required.</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include('includes/footer.php');?>
