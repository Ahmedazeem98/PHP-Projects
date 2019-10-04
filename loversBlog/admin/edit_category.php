<?php include 'includes/header.php'; ?>

<?php

  $db = new Database;
  $query = "SELECT * FROM categories where id =".$_GET['id'];
  $row = $db->select($query);
  $row = $row->fetch_assoc();

  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    if($name ==''){
      header("Location: index.php?error=errror");
    }
      $query = "UPDATE categories
       SET
      name = '$name'
       WHERE id =".$_GET['id'];
       $db->update($query);
    }
?>

<?php
  if(isset($_POST['delete'])){
    $query = "DELETE FROM categories where id =".$_GET['id'];
    $db->delete($query);
  }
 ?>

<form role="form" method="post" action="edit_category.php?id=<?php echo $_GET['id']; ?>">

  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" placeholder="Enter Category Name"
    value="<?php echo $row['name']; ?>" name="name">
  </div>
  <div>
    <input type="submit" class="btn btn-default" value="Submit" name="submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input type="submit" class="btn btn-danger" value="Delete" name="delete">
    <br> <br>
  </div>
</form>

<?php include 'includes/footer.php'; ?>
