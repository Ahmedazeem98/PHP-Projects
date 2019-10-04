<?php include 'includes/header.php'; ?>
<?php
  $db = new Database;
  $query = "SELECT * FROM posts where id = $_GET[id]";
  $post = $db->select($query);
  $row = $post->fetch_assoc();

  $query = "SELECT * FROM categories";
  $categories = $db->select($query);

 ?>
        <div class="blog-post">
          <h2 class="blog-post-title"><?php echo $row['title'] ; ?></h2>
          <p class="blog-post-meta"><?php echo timeFormat($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
          <?php echo $row['body']; ?>
        </div><!-- /.blog-post -->

<?php include 'includes/footer.php'; ?>
