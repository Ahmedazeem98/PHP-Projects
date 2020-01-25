<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php



$db = new Database;
// get form data
if(isset($_POST['add'])){

    $name = ($_POST['name']);

    $query = "SELECT * FROM categories WHERE name ='$name'";
    $res = $db->select($query);
    if($res){
        ?>
        <script>
                window.alert("Already Exist");
                window.location = "categories.php";
        </script>
        <?php
    } else {
       $query = "INSERT INTO categories VALUES ('','$name')";
       if($db->insert($query)){
        ?>
        <script>
                window.alert("Category Added Successfully");
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
    <h2 style="text-align:center;">Add Category</h2>

    <div style="text-align: center;">
     <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
    </div>

        <form enctype="multipart/form-data" action="add_category.php" method="POST" role="form">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="required"
                value="<?php echo isset($_POST['name'])?$_POST['name']:"";?>">
            </div>
            <div style="text-align: center;">
                <input name="add" type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>

    </div>

</body>
</html>
