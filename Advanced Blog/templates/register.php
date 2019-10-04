<?php include('includes/header.php'); ?>
  <form enctype="multipart/form-data" method="post" action="register.php">
      <div class="form-group">
        <label>Name: </label>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
      </div>
      <div class="form-group">
        <label>Choose Username: </label>
        <input type="text" class="form-control" placeholder="Enter Username" name="username">
      </div>
      <div class="form-group">
        <label>Password: </label>
        <input type="password" class="form-control"placeholder="Enter Password" name="password">
      </div>
      <div class="form-group">
        <label>Confirm Password: </label>
        <input type="password" class="form-control"placeholder="Enter Password Again" name="password2">
      </div>
      <div class="form-group">
        <label>Upload Avatar</label>
        <input type="file" name="avatar">
        <p class="help-block"></p>
      </div>
      <div class="form-group">
        <label>About Me</label>
        <textarea id="about" rows="8" cols="80"
        placeholder="Tell us about yourself (Optional)" name="about" class="form-control"></textarea>
          <script>CKEDITOR.replace('about');</script>
      </div>
      <input type="submit" name="register" value="Register" class="btn btn-primary">
  </form>
<?php include('includes/footer.php'); ?>
