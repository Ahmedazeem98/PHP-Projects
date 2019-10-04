</div>
</div>
</div>
<div class="col-md-4">
<div calss="sidebar">
  <div class="bolck">
    
    <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
      <div class="list-group">
        <a class="list-group-item active" href ="topics.php?user=<?php echo $_SESSION['user_id']; ?>">Welcome,  <?php echo $_SESSION['username']; ?> </a>
      </div> <br>
      <form role="form" action="logout.php" method="post">
        <input type="submit" name="logout" class="btn btn-primary" value="logout">
      </form>
    <?php else : ?>
      <h3>Login</h3>
      <form role="form" method="post" action="login.php">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" placeholder="Enter Username" name="username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter Password"
          name="password">
        </div>
        <button name="login" type="submit" class="btn btn-primary">Login</button>
        <a class="btn btn-default" href="register.php">Create Account</a>
    </form>
  <?php endif; ?>
  </div>
  <div class="bolck">
    <h3>Categories</h3>
    <div class="list-group">
      <a href="index.php" class="list-group-item <?php echo is_active(null);?>">All Topics</a>
      <?php foreach($categories as $category) : ?>
        <a href="topics.php?category=<?php echo urlFormat($category->id); ?>" class="list-group-item <?php echo is_active($category->id);?>"><?php echo $category->name; ?> <span class="badge pull-right"><?php echo catTopics($category->id); ?></span> </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>
</div>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
</body>
</html>
