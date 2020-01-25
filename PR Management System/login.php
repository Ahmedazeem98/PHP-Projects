<?php
$adminStaticPassword = md5(159357);
if(isset($_POST['register'])){
  if(md5($_POST['password'])==$adminStaticPassword){
    header("Location:admin.php");
    exit();
  } else{
    header('Location: login.php');
    exit();
  }
}
?>

<?php include('includes/header.php'); ?>
        <section id="showcase">
            <div class="container">
              <form method="post" action="login.php">
                  <div class="form-group">
                    <br>
                    <label>Password: </label>
                    <input type="password" class="form-control" placeholder="Enter Admin Password" name="password">
                    <br>
                    <input type="submit" name="register" value="Login" class="btn btn-primary">
                  </div>
              </form>
            </div>
        </section>
        <div class="last">

        </div>
</body>
</html>
