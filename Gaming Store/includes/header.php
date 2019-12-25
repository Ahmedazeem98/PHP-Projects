<?php require_once ('db.php');?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Gaming Store</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>



  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span style="font-size:24px;">Gaming Store</span></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(!isset($_SESSION['is_logged_in'])) : ?>
              <li><a href="register.php">Create Account</a></li>
              <form class="navbar-form navbar-left" action="search.php" method="post" role="form">
              <div class="form-group">
                  <input type="text" class="form-control" name="search" placeholder="Enter game name"
                  required="required">
              </div>
                  <button name="submit" type="submit" class="btn btn-primary">Search</button>
              </form>
            <?php else :?>
              <form class="navbar-form navbar-left" action="search.php  " method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Enter game name"
                    required="required">
                </div>
                    <button name="submit" type="submit" class="btn btn-primary">Search</button>
              </form>
            <?php endif;?>
          </ul>
          <?php if(!isset($_SESSION['is_logged_in']))  :?>
            <form class="navbar-form navbar-right" action="login.php" method="post">
                <div class="form-group">
                  <input required="required" name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <input required="required" name="password" type="password" class="form-control" placeholder="Enter Password">
                  </div>
                <button name="login" type="submit" class="btn btn-primary">Login</button>
              </form>
          <?php else :?>
            <form class="navbar-form navbar-right" action="logout.php" method="post">
                <div class="form-group">
                  <span style="color:white; font-size:22px;" class="welcome">Welcome, <?php echo $_SESSION['username'];?></span>
                </div>
                <button name="logout" type="submit" class="btn btn-primary">Logout</button>
              </form>
            </a>
              </form>
          <?php endif;?>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-md-4">
            <?php include('sidebar.php');?>
        </div>


        </div>



        <div class="col-md-8">

            <div class="panel panel-default panel-list">
                <div class="panel-heading panel-heading-green">

                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
