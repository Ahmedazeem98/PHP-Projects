<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Product.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php



if(isset($_GET['id'])){

    $products = new Product;
    $id = $_GET['id'];
    $product = $products->getProductByID($id)->fetch_assoc();
}


$categories = getAllCategories();
$db = new Database;
// get form data
if(isset($_POST['edit'])){

    $db = new Database;

    $title = ($_POST['title']);
    $title = $db->scan($title);

    $quantity = $_POST['quantity'];
    $sold = $_POST['sold'];


    $description = ($_POST['description']);
    $description = $db->scan($description);

    $category_id = $_POST['category'];
    $price =  $_POST['price'];

    $query = "UPDATE products SET
        title = '$title',
        quantity = '$quantity',
        sold = '$sold',
        description = '$description',
        category_id ='$category_id',
        price = '$price'
        WHERE id = '$id'
    ";
    $res = $db->UPDATE($query);
    header("Location:products.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gaming Store</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</head>
<body>


    <div class="container">
    <h2 style="text-align:center;">Edit Product</h2>

    <div style="text-align: center;">
     <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
    </div>
        <form action="edit_product.php?id=<?php echo $product['id']; ?>" method="POST" role="form">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter product title" required="required"
                value="<?php echo $product['title'];?>">
            </div>
            <div class="form-group">
                <label>Quantity: </label>
                <input type="number" min="1" max="100" class="form-control" name="quantity" placeholder="Enter Quantity" required="required"
                value="<?php echo $product['quantity'];?>">
            </div>
            <div class="form-group">
                <label>Sold: </label>
                <input type="number" min="1" max="100" class="form-control" name="sold" placeholder="Enter sold Quantity" required="required"
                value="<?php echo $product['sold'];?>">
            </div>

            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Description"
                required="required" value="<?php echo $product['description'];?>">
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select class="form-control" name="category">
                    <?php while($category = $categories->fetch_assoc()): ?>
                        <option <?php echo $category['id'] == $product['category_id']?'selected':'';?> value="<?php echo $category['id'];?>"> <?php echo $category['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Price :</label>
                <input type="decimal" step="any"  class="form-control" name="price" placeholder="Enter Price"  required="required"
                value = "<?php echo $product['price'];?>">
            </div>
            <div style="text-align: center;">
                <input name="edit" type="submit" value="Submit" class="btn btn-primary">
            </div>

    </div>

</body>
</html>
