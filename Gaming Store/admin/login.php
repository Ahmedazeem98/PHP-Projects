<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php


if(isset($_POST['login'])){
  $pass = $_POST['pass'];
  if(md5($pass)==md5("gamingstore")){
    header("Location:http://localhost/seproject/admin/index.php");
  } else{
    ?>
    <script>
      alert("Invalid password");
    </script>
    <?php
}
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gaming Store</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</head>
<body>


    <div class="container">
    <h2 style="text-align:center;">Login as Admin</h2>


        <form enctype="multipart/form-data" action="login.php" method="POST" role="form">
            <div class="form-group">
                <label>Admin Password:</label>
                <input type="password" class="form-control" name="pass" placeholder="Enter Admin password" required="required">
            </div>
            <div style="text-align: center;">
                <input name="login" type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>

    </div>

</body>
</html>
