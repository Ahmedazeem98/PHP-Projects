
<?php require ('core/init.php'); ?>
<?php require ('libraries/Product.php'); ?>
<?php require ('libraries/Users.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Database.php'); ?>


<?php


$categories = getAllCategories();
$mostPopular = getMostPopular();
$cart_items = new Cart;
if(isset($_SESSION['user_id'])){
  $cart_items =$cart_items->current_cart_items_for_specific_user($_SESSION['user_id']);
}

?>

<?php if(isset($_SESSION['is_logged_in'])): ?>
<div class="cart-block">
       <div class="card__content">
          <div class="table-responsive">
          <?php if($cart_items) : ?>
            <table class="table shop-table">
              <thead>
               <tr>
                  <th class="product__info">Product</th>
                  <th class="product__price">Price</th>
                  <th class="product__quantity">Quantity</th>
                  <th class="product__total">Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php while($items = $cart_items->fetch_assoc()) : ?>
              <form action="edit_item.php" method="POST">
                <tr>
                  <td class="product__info">
                    <a href="details.php?id=<?php echo $items['product_id']; ?>"><?php echo $items['title'];?></a>
                  </td>
                  <td class="product__price">
                     <span class="currency"></span><?php echo $items['price'];?>
                   </td>
                  <td class="product__quantity">
                  <input name="quantity" class="qty" type="number" min="1" max="<?php echo get_max_quantity($items['product_id']);?>" value="<?php echo $items['product_quantity']<=$items['quantity']?$items['product_quantity']:$items['quantity'];?>">
                  <input type="hidden" name="product_id" value="<?php echo $items['product_id'];?>">
                  </td>
                  <td class="product__total">
                    <?php echo $items['price']*$items['product_quantity'];?>
                  </td>
                  <td>
                   <a  href="delete_item.php?id=<?php echo $items['product_id'];?>&quantity=<?php echo $items['product_quantity'];?>&user_id=<?php echo $_SESSION['user_id']; ?>">
                    <button type="button" class="btn btn-danger btn-xs">D </button>
                   </a>
                    <button name="update" type="submit" class="btn btn-danger btn-xs">E </button>
                   </a>
                   </td>
                 </tr>
              </form>

                <?php endwhile; ?>
           </input>
        </table>
                  <div style="text-align: center;">
                      <hr>
                      <a href="place_order.php"><button type="button" class="btn btn-primary">Place Order</button></a>
                  </div>

        <?php else : ?>
          <div style="text-align: center;">
            <p>Your Cart is Empty</p>
        </div>
          <?php endif; ?>
     </div>
      </div>
        </div>
<?php endif;?>
          <div class="panel panel-default panel-list">
            <div class="panel-heading panel-heading-dark">
              <h3 class="panel-title">Categories</h3>
            </div>
            <!-- List Group -->
            <ul class="list-group">
            <?php if($categories) :?>
                <?php while ($category = $categories->fetch_assoc()): ?>
                  <li class="list-group-item"> <a href="products.php?cat_id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a></li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>

          <!-- most Popular-->
          <div class="panel panel-default panel-list">
              <div class="panel-heading panel-heading-dark">
              <a class="popular" href="most_popular.php"><h3 style="color:white;" class="panel-title">Most Popular</h3></a>
              </div>
              <!-- List Group -->
              <ul class="list-group">
              <?php if($mostPopular)  :?>
                <?php while ($popularProduct = $mostPopular->fetch_assoc()): ?>
                  <li class="list-group-item"> <a href="details.php?id=<?php echo $popularProduct['id'];?>"><?php echo $popularProduct['title'];?></a></li>
                <?php endwhile; ?>
              <?php endif; ?>
              </ul>
