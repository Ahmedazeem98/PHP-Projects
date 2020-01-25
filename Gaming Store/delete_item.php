<?php require ('core/init.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Database.php'); ?>

<?php

$cart = new Cart;
if(isset($_GET['id']) &&isset($_GET['quantity']) && isset($_GET['user_id'])){
    $product_id = $_GET['id'];
    $quantity = $_GET['quantity'];
    $user_id = $_GET['user_id'];
    $cart->delete_item($user_id,$product_id, $quantity);
    header("Location:index.php");
}
