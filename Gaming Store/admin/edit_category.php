<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Categories.php'); ?>

<?php


$db = new Database;

if(isset($_GET['id'])){

    $categories = new Categories;
    $id = $_GET['id'];
    $category = $categories->getCategoryByID($id)->fetch_assoc();
}
if(isset($_POST['edit'])){

    $name = ($_POST['name']);
    $name  = $db->scan($name);

    $query = "SELECT * FROM categories WHERE name ='$name'";
    $res = $db->select($query);
    if($res){
        ?>
        <script>
                window.alert("Already Exsit");
                window.location = "categories.php";
        </script>
        <?php
    } else {
       $query = "UPDATE categories SET

        name = '$name'
        WHERE id = '$id';
       ";
       if($db->insert($query)){
        ?>
        <script>
                window.alert("Category Edited Successfuly");
                window.location = "categories.php";
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
    <h2 style="text-align:center;">Edit Category</h2>

    <div style="text-align: center;">
     <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
    </div>

        <form action="edit_category.php?id=<?php echo $_GET['id'];?>" method="POST" role="form">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="required"
                value="<?php echo isset($category['name'])?$category['name']:"";?>">
            </div>
            <div style="text-align: center;">
                <input name="edit" type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>

    </div>

</body>
</html>
