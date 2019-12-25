    <?php require ('core/init.php'); ?>
    <?php require ('libraries/Cart.php'); ?>
    <?php require ('libraries/Product.php'); ?>
    <?php require ('libraries/Database.php'); ?>

    <?php
    $cart = new Cart;
    $products = new Product;

    ?>
<script>

setInterval(function() {
    <?php

    $cart_items = $cart->getCartItems();

    while($item = $cart_items->fetch_assoc()){
        $cart_product_id = $item['product_id'];
        $all_products = $products->getAllProducts();
        while($product = $all_products->fetch_assoc()){
            if($product['id']==$cart_product_id){
                if($item['product_quantity']>$product['quantity']){
                    $new = $product['quantity'];
                    $db = new Database;
                    $query = "UPDATE cart SET
                     product_quantity = '$new'
                     ";
                     $db->update($query);
                     $page = $_SERVER['PHP_SELF'];
                     $sec = "3";
                     header("Refresh: $sec; url=$page");
                }
            break;
            }
        }
    }



        ?>
}, 3000);
</script>
