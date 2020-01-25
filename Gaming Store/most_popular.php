
<?php include('includes/header.php'); ?>

<?php


$Product = new Product();
$products = $Product->most_popular();




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

     <div class="game-add">
        <form action="add_to_cart.php" method="POST">
                <strong>Quantity:</strong>
                <input value="1" class="qty" type="number" min="1" max="<?php echo $product['quantity'];?>">
     <?php if(isset($_SESSION['is_logged_in'])): ?>
            <?php if($product['quantity']>0) : ?>
            <?php endif; ?>
            <input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
            <input type="hidden" name="quantity" value="<?php echo $product['quantity'];?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
            <br>
            <button name="add" <?php echo $product['quantity']>0?"":"disabled='disabled'";?> class="btn btn-primary" type="submit"> <?php echo $product['quantity']>0?"Add To Cart":"Out of stock";?></button>
        </form>
        <?php endif; ?>
     </div>
</div>
<?php endwhile;?>
<?php endif; ?>
<?php include('includes/footer.php'); ?>
