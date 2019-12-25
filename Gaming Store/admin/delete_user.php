<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Users.php'); ?>

<?php

session_start();
$User = new User;
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $User->delete_user($id);
    session_unset();
    ?>
    <script>
      window.location="users.php";
    </script>
    <?php
    //header("Location:users.php");
}

?>
