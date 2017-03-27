<header class="banner hidden-sm-down">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-left">
        <a href="/CS4014_project/login.php">
          <h2 class="header-heading">Peer Review Centre</h2>
        </a>
      </div>
      <div class="login-form col-md-6 offset-md-2">
        <form class="form-inline" action="login.php" novalidate="novalidate" method="post" onsubmit="">
          <div class="form-group">
            <div id="emailSignInGroup" class="form-group">
              <input id="signInEmail" name="signInEmail" class="form-control" type="email" placeholder="email" />
            </div>
            <div id="passwordSignInGroup" class="form-group">
              <input id="signInPassword" name="signInPassword" type="password" class="form-control" placeholder="password"/>
              <input type="submit" class="btn btn-default" value="login" name="loginSubmitButton" role="button"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
