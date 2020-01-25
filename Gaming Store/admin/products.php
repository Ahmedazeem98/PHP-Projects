<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Product.php'); ?>

<?php




$Products = new Product;
$products = $Products->getAllProducts();



?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Products</h1>

        <div style="text-align: center;">
          <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
        </div>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <?php if($products) :?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th>Action</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($product = $products->fetch_assoc()) :?>
                        <tr>
                            <td><?php echo $product['title'];?></td>
                            <td>
                            <a  href="edit_product.php?id=<?php echo $product['id'];?>"> <button class="btn btn-primary">Edit</button> </a>
                            <a  href="delete_product.php?id=<?php echo $product['id'];?>"> <button class="btn btn-danger">DELETE</button> </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            </div>
</div>
