<?php require ('core/init.php'); ?>
<?php require ('libraries/Users.php'); ?>
<?php require ('libraries/Database.php'); ?>
<?php

session_start();
if(isset($_SESSION['is_logged_in'])){
  header("Location:index.php");
}
if(isset($_POST['login'])){
$username =$_POST['username'];
$password= $_POST['password'];
$user = new User;
if($user->login($username,$password)){
    ?>
    <script>
        alert("You are logged in");
       window.location = "index.php";
    </script>
    <?php


} else{
    ?>
    <script>
        alert("Invalid username or password");
        window.location = "index.php";
    </script>
    <?php
}
}
