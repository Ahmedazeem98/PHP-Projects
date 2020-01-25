<?php include 'config/config.php'; ?>
<?php include 'helpers/db_helpers.php'; ?>
<?php

// create database object
$db = new Database;


// get doctors names
$query = "SELECT * FROM doctors WHERE status = 1";
$doctors = $db->select($query);


if(isset($_POST['register'])){
  // Get doctor name
$doctor_id = $_POST['doctor'];
$query = "SELECT * FROM doctors WHERE id = $doctor_id";
$row = $db->select($query);
$doctor_info = $row->fetch_assoc();
$doctorName = $doctor_info['name'];

// Get user Info
$employee = $_POST['employee'];
$type = $_POST['type'];
$purpose = $_POST['purpose'];
$result = $_POST['result'];
$postpnement_date = strtotime($_POST['postponementdate']);
$special_purpose = $_POST['special-purpose'];
$reasons_of_refused = $_POST['reasons_of_refused'];
$notes = $_POST['notes'];

// insert user info
$query = "INSERT INTO pr_employees 
(name, communication_type, doctor, communication_purpose, result,refused_reasons, notes)
VALUES('$employee','$type','$doctorName','$purpose','$result','$reasons_of_refused','$notes')";
$last_id = $db->insert($query);

// Update doctors info 
if($result == "accepted"){
  if($doctor_info['first_activity'] == NULL){
    $query = "UPDATE doctors 
    SET
      first_activity = CURRENT_TIMESTAMP
      WHERE id =".$doctor_id;
      $db->update($query);
  }
  $query = "UPDATE doctors 
   SET
    last_activity = CURRENT_TIMESTAMP
    WHERE id =".$doctor_id;
    $db->update($query);

  $number_of_communications = $doctor_info['number_of_communications'];
  $query = "UPDATE doctors 
    SET
      number_of_communications = $number_of_communications + 1
      WHERE id =".$doctor_id;
      $db->update($query);
  
  if($purpose == "shooting"){
    $number_of_videos = $doctor_info['number_of_videos'];
    $query = "UPDATE doctors 
    SET
    number_of_videos = $number_of_videos + 1
      WHERE id =".$doctor_id;
      $db->update($query);
  }
} else if($result == "postponement"){
  $query = "UPDATE pr_employees 
    SET
      postponement_date = $postpnement_date
      WHERE id =".$last_id;
      $db->update($query);
}

header("Location:".$_SERVER['PHP_SELF']);
}
?>

<?php include('includes/header.php'); ?>
        <section id="showcase">
            <div class="container">

                <form method="post" action="register.php">
                    <div class="form-group">
                      <label>Name: </label>
                      <input type="text" class="form-control" placeholder="Enter Your Name" name="employee">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" class="form-control" name="type">
                            <option disabled selected>Communication type</option>
                            <option value="call">Call</option>
                            <option value="whatsapp">What's App</option>
                            <option value="interview">Interview</option>
                         </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" class="form-control" name="doctor">
                            <option selected>Select Doctor</option>
                             <?php while($doctor = $doctors->fetch_assoc()) : ?>
                              <option value="<?php echo $doctor['id'];?>">
                                <?php echo $doctor['name'];?>
                              </option>
                             <?php endwhile; ?>
                          
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Communication Purose</label>
                      <select class="custom-select" class="form-control" name="purpose">
                            <option disabled selected>Communication Purpose</option>
                            <option value="interview">Interview</option>
                            <option value="Follow">follow-up</option>
                            <option value="shooting">Shooting</option>
                            <option value="confirm">Confirm Appointment</option>
                            <option value="special">Special Purpose</option>
                      </select>
                      <br><br>
                      <select class="custom-select" class="form-control" name="result">
                            <option disabled selected>Result</option>
                            <option value="accepted">Accepted</option>
                            <option value="refused">Refused</option>
                            <option value="postponement">Postponement</option>
                      </select>
                    <div class="form-group">
                      <label>Special Purpose</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="special-purpose"></textarea>
                    </div>
                    </div>
                    <div class="form-group">
                    <label><strong>Enter Postponement date</strong></label>
                        <input class="form-control" type="date" name="postponementdate">
                    </div>
                    <div class="form-group">
                      <label>Reasons of refused</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="reasons_of_refused"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="exampleTextarea" rows="3" name="notes" placeholder="(Optional)"></textarea>
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
