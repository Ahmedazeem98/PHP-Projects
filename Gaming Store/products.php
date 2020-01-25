
<?php include('includes/header.php'); ?>

<?php


// handel most popular by adding number of seles of every product
$new_product = new Product;
if(isset($_GET['cat_id'])){
    $products = $new_product->getAllProducts_byCategory($_GET['cat_id']);
} else {
    $products = false;
}



?>

<?php if($products) :?>
<?php while($product = $products->fetch_assoc()) :?>
<div class="col-md-4 game">
    <div class="game-price"><?php echo $product['price'];?>LE</div>
        <a href="details.php?id=<?php echo $product['id'];?>">
        <img width="250" height="250" src="assets/images/products/<?php echo $product['image'];?>">
        </a>
    <div class="game-title">
        <strong><?php echo $product['title'];?></strong>
    </div>
        <form action="add_to_cart.php" method="POST" role="form">

    <?php if(isset($_SESSION['is_logged_in'])): ?>
     <div class="game-add">
                <strong>Quantity:</strong>
                <input name="quantity" value="1" class="qty" type="number" min="1" max="<?php echo $product['quantity'];?>">
            <?php if($product['quantity']>0) : ?>
            <?php endif; ?>
            <input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
            <br>
            <button name="add" <?php echo $product['quantity']>0?"":"disabled='disabled'";?> class="btn btn-primary" type="submit"> <?php echo $product['quantity']>0?"Add To Cart":"Out of stock";?></button>
        </form>
     </div>
            <?php else: ?>
                <br> <br> <br>
            <?php endif;?>
</div>
<?php endwhile;?>
            <?php else :?>
                <h3 style="text-align:center;" >No Available Products yet, Stay tund</h3>
<?php endif; ?>
<?php include('includes/footer.php'); ?>
