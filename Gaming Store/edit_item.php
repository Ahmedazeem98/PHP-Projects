<?php require ('core/init.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Database.php'); ?>

<?php

session_start();
$cart = new Cart;

if(isset($_POST['update'])){
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $cart->update_item($user_id,$product_id,$quantity);
    $page = $_SERVER['HTTP_REFERER'];
    header("Location:".$page);
}
