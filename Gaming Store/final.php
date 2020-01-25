<?php require ('core/init.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Product.php'); ?>
<?php require ('libraries/Database.php'); ?>
<?php
session_start();

$cart = new Cart;
$user_id = $_SESSION['user_id'];
$items = $cart->getCartItems($user_id);
$product = new Product;
while($item = $items->fetch_assoc()){

    $product_id = $item['product_id'];
    $quantity = $item['product_quantity'];

    $max_quantity = get_max_quantity($product_id);

    if($quantity>$max_quantity){

        $cart->update_item($user_id,$product_id,$max_quantity);

        ?>
        <script>
            alert("Please Review you cart");
            window.location="index.php";
        </script>

        <?php
    } else{

        $product->update_quantity($product_id,$quantity);
        $cart->check_out($user_id);
    }

}

?>
<script>

    var today = new Date();
    today.setDate(today.getDate() + 3);
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    alert("We are so pleased to dealing with you, yor order will deliverd at most at "+ date);
    window.location="index.php";
</script>
