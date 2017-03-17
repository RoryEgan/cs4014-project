<header class="banner hidden-sm-down">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-left">
        <a href="/CS4014_project/login.php">
          <h1 class="header-heading">Our Website</h1>
        </a>
      </div>
      <div class="login-form col-md-6">
        <form class="form-inline" action="login.php" novalidate="novalidate" method="post" onsubmit="">
          <div class="form-group">
            <div id="emailSignInGroup" class="form-group">
              <label class="mr-2 login-form" for="email">Email: </label>
              <input id="signInEmail" name="signInEmail" class="form-control" type="email" placeholder="email" />
            </div>
            <div id="passwordSignInGroup" class="form-group">
              <label class="mx-2 login-form" for="password">Password: </label>
              <input id="signInPassword" name="signInPassword" type="password" class="form-control" placeholder="password"/>
              <input type="submit" class="btn btn-default" value="login" name="loginSubmitButton" role="button"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
