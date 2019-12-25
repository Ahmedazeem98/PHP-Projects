<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Categories.php'); ?>

<?php





$categories = new Categories;
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $categories->delete_category($id);
    header("Location:categories.php");
}

?>
