<?php require ('core/init.php'); ?>
<?php require ('libraries/Users.php'); ?>
<?php require ('libraries/Database.php'); ?>
<?php
session_start();
$user = new User;

$user->logout();

    ?>
    <script>
        alert("you are logged out");
        window.location = "index.php";
    </script>
    header("Location:index.php");
    ?>
