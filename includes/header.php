
<?php
      include('includes/php/scripts/check-session.php');
      ?>
<header class="banner hidden-sm-down">
  <div class="container">
    <div class="flex-row">
      <div class="col-xs-12 text-center">
        <a href="#">
          <h1 class="header-heading">Our Website</h1>
        </a>
      </div>
    </div>
  </div>
</header>
<div id="sticky-nav-wrap">
  <header class="navbar navbar-toggleable-md navbar-default navbar-inverse navbar-static-top">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="col-md-6">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <div class="nav-menu">
            <ul class="navbar-nav mr-auto mt-2 mt-md-0">
              <li class="active nav-item"><a href="index.php">Home</a></li>
              <li class="active nav-item"><a href="profile.php">Profile</a></li>
              <li class="active nav-item"><a href="faq.php">FAQS</a></li>
              <?php if(false){
                ?>
                <li class="active nav-item"><a href="#flagged-tasks.php">Flagged Tasks</a></li>
                <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <i class="fa fa-search">
              <a href="#"></a>
            </i>
          </button>
        </form>
      </div>
      <div class="col-md-1">
        <div class="dropdown">
          <button class="btn btn-secondary" role="button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">You are logged in with: <?php echo $_SESSION['email'];?>
            <a class="dropdown-item" href="profile.php">View Profile</a>
            <a class="dropdown-item" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
