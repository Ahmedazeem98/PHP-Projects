<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Product.php'); ?>

<?php


$product = new Product;
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $product->delete_Product($id);
    header("Location:products.php");
}

?>
