<?php include('includes/head.php');?>
<?php include('includes/login-header.php');?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-6">
        <div class="login-boundry my-5">
          <h2 class="my-3">Sign up!</h2>
          <form class="form" action="" method="">
            <div class="form-group">
              <div class="form-inline">
                <input class="form-control my-2" type="text" name="" value="" placeholder="First Name"/>
                <input class="form-control my-2" type="text" name="" value="" placeholder="Last Name"/>
              </div>
              <input id="email" class="form-control my-2" type="email" placeholder="Email"/>
              <input id="password" type="text" class="form-control my-2" placeholder="Student ID"/>
              <select class="form-control my-2">
                <option selected hidden>Subject / Discipline</option>
                <option value="Biology">Biology</option>
                <option value="Computer science">Computer Science</option>
                <option value="Physics">Physics</option>
                <option value="Engineering">Engineering</option>
                <option value="Chemistry">Chemistry</option>
              </select>
              <input id="password" type="password" class="form-control my-2" placeholder="Password"/>
              <input id="password" type="password" class="form-control my-2" placeholder="Confirm Password"/>
              <input type="submit" class="btn btn-default my-2" value="Sign Up">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include('includes/footer.php');?>
