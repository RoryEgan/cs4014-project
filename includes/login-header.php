<header class="banner hidden-sm-down">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-left">
        <a href="/cs4014">
          <h1 class="header-heading">Our Website</h1>
        </a>
      </div>
      <div class="login-form col-md-6">
        <form class="form-inline" action="" method="">
          <div class="form-group">
            <label class="mr-2" for="email">Email: </label>
            <input id="signInEmail" class="form-control" type="email" placeholder="email" onblur="validateEmail()"/>
            <label class="mx-2" for="password">Password: </label>
            <input id="signInPassword" type="password" class="form-control" placeholder="password" onblur="validatePassword(this.value)"/>
            <input type="submit" class="btn btn-default" value="login">
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
