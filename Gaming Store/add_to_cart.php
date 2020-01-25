<?php require ('core/init.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Database.php'); ?>
<?php
session_start();
$cart = new Cart;
if(isset($_POST['add'])){

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_POST['user_id'];

    $max_quantity = get_max_quantity($product_id);
    $quantity_in_cart = get_quantity_from_cart($user_id,$product_id);
    if($quantity+$quantity_in_cart<=$max_quantity){
        $cart->add_to_cart($user_id, $product_id, $quantity);
        $previous = $_SERVER["HTTP_REFERER"];

        if($previous=='http://localhost/seproject/search.php'){
            header("Location:index.php");
        } else{

            header("Location:".$previous);
        }
    } else{
        $cart->add_to_cart($user_id,$product_id,abs($max_quantity-$quantity_in_cart));
        $previous = $_SERVER["HTTP_REFERER"];
        if($previous=='http://localhost/seproject/search.php'){
            header("Location:index.php");
         } else{

            header("Location:".$previous);
        }
    }

}
