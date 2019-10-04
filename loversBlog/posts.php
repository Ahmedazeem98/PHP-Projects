<?php include 'includes/header.php'; ?>
<?php

  $db = new Database;
  $query = "SELECT * FROM posts WHERE category =".$_GET['category'];
  $posts = $db->select($query);

  $query = "SELECT * FROM categories";
  $categories = $db->select($query);
 ?>
 <?php if($posts) : ?>
   <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo timeFormat($row['date']);?><a href="#"><?php echo $row['author']; ?></a></p>
            <?php echo $row['body']; ?>
          </div><!-- /.blog-post -->
      <hr>
    <?php endwhile; ?>
<?php else : ?>
  <p><?php echo "No posts yet!"; ?></p>
<?php endif; ?>
  <?php include 'includes/footer.php'; ?>
