
<?php require ('core/init.php'); ?>
<?php require ('libraries/Cart.php'); ?>
<?php require ('libraries/Users.php'); ?>
<?php require ('libraries/Database.php'); ?>
<?php require ('libraries/Product.php'); ?>
<?php
session_start();

$cart = new Cart;
$products = new Product;
$shipping = 0;
$cart_items = $cart->getCartItems($_SESSION['user_id']);
if(isset($_SESSION['city'])){
    $shipping = shipping($_SESSION['city']);
    }
$subtotal = 0;


?>




</body>
</html>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
<!------ Include the above in your HEAD tag ---------->
<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template
<link href="assets/css/custom.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
-->
<head>
<style>
a:hover{
    text-decoration: none;
}
</style>
</head>
<section class="jumbotron text-center">
    <div class="container">
        <a style="a:hover{text-decoration:none;}" href="index.php"><h1 class="jumbotron-heading">Gaming Store</h1></a>
     </div>
</section>
<?php if(!$cart_items){
  ?>
  <script>
    alert("Your Cart in Empty");
    window.location = "index.php";
  </script>
  <?php
}
?>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <?php if($cart_items) : ?>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-left">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php while($item = $cart_items->fetch_assoc()) :?>
                    <?php
                        $product = $products->getProductByID($item['product_id'])->fetch_assoc();
                        $title = $product['title'];
                        $price = $product['price'];

                    ?>
                        <tr>
                            <td><?php echo $title ?></td>
                            <td><?php echo $item['product_quantity']; ?></td>
                            <td class="text-right"><?php echo $price*$item['product_quantity']; $subtotal+=$price*$item['product_quantity'];  ?> LE</td>
                        </tr>
                        <?php endwhile; ?>
                        </table> <hr>
                        <br><br>
             <?php endif; ?>
             <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Sub-Total</th>
                            <th scope="col" class="text-left">Shipping</th>
                            <th scope="col" class="text-right">Total</th>
                            <th scope="col" class="text-right" >Payment</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $subtotal ?> LE</td>
                            <td><?php echo $shipping['shipping'];?> LE</td>
                            <td class="text-right"><?php echo ceil($subtotal + $shipping['shipping']); ?> LE</td>
                            <th class="text-right">Cash</th>
                        </tr>
            </table>
            <br><br>
            <table class="table table table-dark">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th  scope="col"class="text-center"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th  scope="col"class="text-center"><?php echo $_SESSION['email'];?></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Mobile</th>
                            <th  scope="col"class="text-center"><?php echo $_SESSION['mobile'];?></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>City</th>
                            <th  scope="col"class="text-center"><?php echo $_SESSION['city'];?></td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th  scope="col"class="text-center"><?php echo $_SESSION['address'];?></td>
                        </tr>
                    </thead>

                    <thead>
                        <tr>
                            <th>Info</th>
                            <th  scope="col"class="text-center">
                            <a href="edit.php?id=<?php echo $_SESSION['user_id'];?>">
                                <button type="button" class="btn btn-primary">Edit Info</button>
                            </a>
                            </td>
                        </tr>
                    </thead>

            </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
            <div class="col-sm-12 col-md-6 text-right">
                   <a href="index.php"> <button class="btn btn-lg btn-block btn-success text-uppercase">Edit Cart / Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="final.php"> <button type="button" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
