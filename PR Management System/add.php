<?php include 'config/config.php'; ?>
<?php include 'helpers/db_helpers.php'; ?>
<?php

// create database object
$db = new Database;

// get contact presons
$query = "SELECT * FROM contact_person";
$res = $db->select($query);

if(isset($_POST['register'])){

// Get doctor Info
$employee = $_POST['employee'];
$name = $_POST['name'];
$code = $_POST['code'];
$mobile = $_POST['mobile'];
$reason = $_POST['reason'];
$status = intval($_POST['status']);
$notes = $_POST['notes'];
$check_pic = 0;
  
    if(upload_pic($name)){
      $picture = $name.".".$_SESSION[$name];
      $check_pic = 1;
     $query = "INSERT INTO doctors (employee,name,code,mobile,check_pic,picture,status,notes,reason)
     VALUES('$employee','$name','$code','$mobile','$check_pic','$picture','$status','$notes','$reason')";
     $db->insert($query);
      header("Location:".$_SERVER['PHP_SELF']);
     } else {
      header("Location:".$_SERVER['PHP_SELF']);
     }
   }

?>


<?php include('includes/header.php'); ?>
        <section id="showcase">
            <div class="container">

                <form enctype="multipart/form-data" method="post" action="add.php">
                  <br>
                    <div class="form-group">
                      <select class="custom-select" name="employee">
                          <option selected>Select Employee</option>
                        <?php while($employee = $res->fetch_assoc()) : ?>
                          <option value="<?php echo $employee['name']; ?>">
                            <?php echo $employee['name']; ?>
                          </option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Name: </label>
                      <input type="text" class="form-control" placeholder="Enter Doctor Name" name="name">
                    </div>
                    <div class="form-group">
                      <label>Code: </label>
                      <input type="text" class="form-control" placeholder="Enter Doctor Code" name="code">
                    </div>
                    <div class="form-group">
                      <label>Mobile: </label>
                      <input type="text" class="form-control" placeholder="Enter Phone Number" name="mobile">
                    </div>
                    <div class="form-group">
                      <label>Reason</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="reason" placeholder="Enter Reason"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Upload Signture</label>
                      <input type="file" name="signture">
                      <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="status">
                            <option selected>Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                         </select>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="notes" placeholder="Any Notes ?"></textarea>
                    </div>
                    <input type="submit" name="register" value="Register" class="btn btn-primary">
                </form>
              </div>
        </section>
        <div class="last">

        </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
