<?php include 'includes/header.php'; ?>
<?php
  // create database object
  $db = new Database;
  $query = "SELECT * FROM posts";
  $posts = $db->select($query);


  $query = "SELECT * FROM categories";
  $categories = $db->select($query);

 ?>
 <?php if($posts) : ?>
   <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo timeFormat($row['date']);?><a href="#"><?php echo $row['author']; ?></a></p>
            <?php echo shortenText($row['body'],350); ?>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
          </div><!-- /.blog-post -->
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
  <?php include 'includes/footer.php'; ?>
