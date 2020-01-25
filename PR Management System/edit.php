<?php include 'config/config.php'; ?>
<?php include 'helpers/db_helpers.php'; ?>
<?php

// create database object
$db = new Database;

// get Archived doctors
if(isset($_GET['id']) && isset($_GET['action'])){

  if($_GET['action'] == 1){
    $id = $_GET['id'];
    $query = "SELECT * FROM doctors where id = $id";
    $doctors = $db->select($query);
    $doctor = $doctors->fetch_assoc();
  }
}
if(isset($_POST['register']) && isset($_GET['action'])){

  if($_GET['action'] == 1){
    // get form data
    $employee  = $_POST['employee'];
    $name  = $_POST['name'];
    $code  = $_POST['code'];
    $mobile  = $_POST['mobile'];
    $status = $_POST['status'];
    $reason = $_POST['reason'];
    $notes = $_POST['notes'];
    $query = "UPDATE doctors
    SET
    name = '$name',
    code = '$code',
    mobile = '$mobile',
    status = '$status',
    reason = '$reason',
    notes = '$notes'
    WHERE id =".$_GET['id'];
    $db->update($query);
    header("Location:".$_GET['page'].".php");
}


} else if(isset($_GET['id']) && isset($_GET['action'])) {

  if($_GET['action'] == 2){
    $query = "DELETE FROM doctors WHERE id=".$_GET['id'];
    $db->delete($query);
    header("Location:".$_GET['page'].".php");
  }
}


 ?>

<?php include('includes/header.php'); ?>
         <section id="showcase">
             <div class="container">

                 <form enctype="multipart/form-data" method="post" action="edit.php?id=<?php echo $_GET['id']; ?>&action=<?php echo $_GET['action'];?>&page=<?php echo $_GET['page'];?>">
                     <div class="form-group">
                       <label>Name: </label>
                       <input type="text" class="form-control" value="<?php echo $doctor['name']; ?>" name="name">
                     </div>
                     <div class="form-group">
                       <label>Code: </label>
                       <input type="text" class="form-control" value="<?php echo $doctor['code']; ?>"  name="code">
                     </div>
                     <div class="form-group">
                       <label>Mobile: </label>
                       <input type="text" class="form-control" value="<?php echo $doctor['mobile']; ?>" name="mobile">
                     </div>
                    
                     <div class="form-group">
                         <select class="custom-select" name="status">
                           <?php
                             if($doctor['status'] == 1){
                              ;
                               $active = 'selected';
                               $unactive = '';
                             } else {
                                $unactive = 'selected';
                                 $active = '';
                             }
                            ?>

                             <option <?php echo $active; ?> value="1">Active</option>
                             <option <?php echo $unactive; ?> value="0">Inactive</option>
                          </select>
                     </div>
                     <div class="form-group">
                      <label>Reason</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="reason"><?php echo $doctor['reason']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="notes"><?php echo $doctor['notes']; ?></textarea>
                    </div>
                     <input type="submit" name="register" value="Submit" class="btn btn-primary">
                 </form>
               </div>
         </section>
         <div class="last">

         </div>

     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>

 </body>
 </html>
