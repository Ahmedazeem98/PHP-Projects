<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Product.php'); ?>
<?php




$categories = getAllCategories();
$product = new Product;
$db = new Database;
// get form data
if(isset($_POST['add'])){

    $title = ($_POST['title']);

    $quantity = $_POST['quantity'];
    $sold = $_POST['sold'];


    $description = ($_POST['description']);

    $category_id = $_POST['category'];
    $price =  $_POST['price'];

    if($product->upload_avatar()=="added"){
        $avatar = $_FILES['avatar']['name'];
      } else {
        $avatar = 'noimage.jpg';
      }
    $query = "SELECT * FROM products WHERE title  LIKE '%".$title."%'";
    $res = $db->select($query);
    if($res){
        ?>
        <script>
                window.alert("Already Exist");
        </script>
        <?php
    } else {
       $query = "INSERT INTO products (category_id,title,quantity,price,description,image)
       VALUES('$category_id','$title','$quantity','$price','$description','$avatar')";
       if($db->insert($query)){
        ?>
        <script>
                window.alert("Product Added Successfully");
                window.location = "products.php";
        </script>
        <?php
       } else{
        ?>
        <script>
                window.alert("There is error in Insertion");
        </script>
        <?php
       }
    }
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
    <h2 style="text-align:center;">Add Product</h2>

    <div style="text-align: center;">
     <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
    </div>

        <form enctype="multipart/form-data" action="add_product.php" method="POST" role="form">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter product title" required="required"
                value="<?php echo isset($_POST['title'])?$_POST['title']:"";?>">
            </div>
            <div class="form-group">
                <label>Quantity: </label>
                <input type="number" min="1" max="100" class="form-control" name="quantity" placeholder="Enter Quantity" required="required"
                value="<?php echo isset($_POST['quantity'])?$_POST['quantity']:'';?>">
            </div>

            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Description"
                required="required" value="<?php echo isset($_POST['description'])?$_POST['description']:'';?>">
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select class="form-control" name="category">
                    <?php while($category = $categories->fetch_assoc()): ?>
                        <option value="<?php echo $category['id'];?>"> <?php echo $category['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Price :</label>
                <input type="number" step="any" class="form-control" name="price" placeholder="Enter Price"  required="required">
            </div>
            <div class="form-group">
                <label>Upload photo :</label>
                <input type="file" class="form-control" name="avatar">
            </div>

            <div style="text-align: center;">
                <input name="add" type="submit" value="Submit" class="btn btn-primary">
            </div>

    </div>

</body>
</html>
