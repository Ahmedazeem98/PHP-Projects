<?php include 'includes/header.php'; ?>
<?php
$db = new Database;
$query = "SELECT * FROM posts where id =".$_GET['id'];
$post = $db->select($query);
$post = $post->fetch_assoc();

$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>

<?php
  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body =mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if($title =='' || $body ==''|| $category ==''|| $author ==''|| $tags==''){
      header("Location: index.php?error=errror");
    }
      $query = "UPDATE posts
       SET
      title = '$title',
       body = '$body',
        category = '$category',
       author = '$author',
        tags='$tags'
       WHERE id =".$_GET['id'];
       $db->update($query);
    }
?>

<?php
  if(isset($_POST['delete'])){
    $query = "DELETE FROM posts where id =".$_GET['id'];
    $db->delete($query);
  }
 ?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $_GET['id']; ?>">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
  </div>

  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" rows="8" cols="80" class="form-control" placeholder="Enter Post">
    <?php echo $post['body']; ?></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category">
      <?php while($row = $categories->fetch_assoc()): ?>
        <?php
          if($post['category'] == $row['id']){
            $selected = 'selected';
          } else {
            $selected = '';
          }
         ?>
        <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Aurhor Name"
    value="<?php echo $post['author']; ?>">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags"
    value="<?php echo $post['tags']; ?>">
  </div>
  <div>
    <input type="submit" class="btn btn-default" value="Submit" name="submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input type="submit" class="btn btn-danger" value="Delete" name="delete">
    <br> <br>
  </div>
</form>


<?php include 'includes/footer.php'; ?>
