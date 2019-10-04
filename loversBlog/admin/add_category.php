<?php include 'includes/header.php'; ?>
<?php
$db = new Database;
  if(isset($_POST['submit'])){
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    if($_POST['category']==''){
        header("Location: index.php?error=errror");
        exit();
    } else {
      $query = "INSERT INTO categories(name)VALUES('$category')";
      $db->insert($query);
    }
  }

 ?>
 
<form role="form" action="add_category.php" method="post">

  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" placeholder="Enter Category Name" name="category">
  </div>
<div>
  <input type="submit" class="btn btn-default" value="Submit" name="submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <br> <br>
</div>
</form>

<?php include 'includes/footer.php'; ?>
