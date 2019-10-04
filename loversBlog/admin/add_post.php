<?php include 'includes/header.php'; ?>

<?php
  $db = new Database;

  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body =mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if($title=='' || $body==''||$category==''||$author==''||$tags==''){
      header("Location: index.php?error=errror");
    }
      $query = "INSERT INTO posts(title, body, category, author, Tags)
      VALUES('$title', '$body', '$category', '$author', '$tags')";
      $db->insert($query);
    }
 ?>

<?php

    $query = "SELECT * FROM categories";
    $categories = $db->select($query);
 ?>

<form role="form" method="post" action = "add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" placeholder="Enter Title" name="title">
  </div>

  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" rows="8" cols="80" class="form-control" placeholder="Enter Post"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category">
      <<?php while($row = $categories->fetch_assoc()): ?>
        <?php
          if($post['category'] == $row['id']){
            $selected = 'selected';
          } else {
            $selected = '';
          }
         ?>
        <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Aurhor Name">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>

  <input type="submit" class="btn btn-default" value="Submit" name="submit">
  <a href="index.php" class="btn btn-default">Cancel</a> <br> <br>
</form>


<?php include 'includes/footer.php'; ?>
