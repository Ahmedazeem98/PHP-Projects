
<?php include('includes/header.php'); ?>

<?php

    $new_product = new Product;
    $product = $new_product->getProductByID($_GET['id']);
    $product = $product->fetch_assoc();
?>


<div class="row details">
    <div class="col-md-5">
        <img src="assets/images/products/<?php echo $product['image'];?>" width="280" height="350">
    </div>
    <div class="col-md-7">
        <h3><?php echo $product['title'];?></h3>
        <div class="details-price">
             Price :<strong><?php echo $product['price'];?></strong> LE
        </div>
        <div class="details-description">
         <p>
             <?php echo $product['description'];?>
         </p>
         </div>
        <div class="details-buy">
        <?php if(isset($_SESSION['is_logged_in'])): ?>
            <form action="add_to_cart.php" method = "POST">
                <strong>Quantity:</strong>
                <input name="quantity" value="1" class="qty" type="number" min="1" max="<?php echo $product['quantity'];?>">
            <?php if($product['quantity']>0) : ?>
            <?php endif; ?>
            <input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
            <button name="add" <?php echo $product['quantity']>0?"":"disabled='disabled'";?> class="btn btn-primary" type="submit"> <?php echo $product['quantity']>0?"Add To Cart":"Out of stock";?></button>
            </form>
            <?php endif;?>
        </div>
    </div>
 </div>
 <?php include('includes/footer.php'); ?>
