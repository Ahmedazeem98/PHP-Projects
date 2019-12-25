
<?php include('includes/header.php'); ?>
<?php ob_start(); ?>

<?php

$user = new User;
$db = new Database;
$governorates = get_governorates();
if(isset($_POST['register'])){
    $data = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' =>$_POST['username'],
        'email' => $_POST['email'],
        'mobile' => $_POST['mobile'],
        'city' => $_POST['city'],
        'address' => $_POST['address'],
        'password' => md5($_POST['password']),
        'password2' => md5($_POST['password2']),
    );


    if(!empty($data['address'])){
        $username = $data['username'];
        $email = $data['email'];
        if($db->select("SELECT * FROM users WHERE username LIKE '%".$username."%' AND email LIKE '%".$email."%'")
        || $db->select("SELECT * FROM users WHERE username LIKE '%".$username."%'") ||
        $db->select("SELECT * FROM users WHERE email LIKE '%".$email."%'")){
            ?>
            <script>
                 alert("Already registered");
            </script>
            <?php
        } else{

            if($data['password']==$data['password2']){
                if($user->register($data)){
                    header('Location:index.php');
                } else{
                    ?>
                <script>
                     alert("Please Insert your data correctly");
                </script>
                <?php
                }
            } else {
                ?>
                <script>
                     alert("password does not match");
                </script>
                <?php

            }

        }
    } else{
        ?>
        <script>
             alert("Please Insert your data correctly");
        </script>
        <?php
    }
}


?>
<form action="register.php" method="POST" role="form">
    <div class="form-group">
         <label>First Name :</label>
         <input pattern="[a-zA-z]{3,15}" type="text" class="form-control" name="first_name" placeholder="Enter Your Name [5:15 chars]"
         required="required" value="<?php echo isset($_POST['first_name'])?$_POST['first_name']:"";?>">
    </div>
     <div class="form-group">
         <label>Last Name :</label>
         <input pattern="[a-zA-z]{3,15}" type="text" class="form-control" name="last_name" placeholder="Enter Your Name [5:15 chars]"
         required="required" value="<?php echo isset($_POST['last_name'])?$_POST['last_name']:'';?>">
    </div>

    <div class="form-group">
        <label>Email :</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email"
        required="required" value="<?php echo isset($_POST['email'])?$_POST['email']:'';?>">
    </div>
    <div class="form-group">
        <label>Mobile :</label>
        <input type="text" pattern="[0-9]{11,15}" class="form-control" name="mobile" placeholder="Enter Your mobile"
        required="required" value="<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>">
    </div>
    <div class="form-group">
    <br>
        <label for="gender1" class="col-md-2 control-label">Governorates:</label>
        <div class="col-lg-4">
        <select name="city" class="form-control">
        <?php while($gov = $governorates->fetch_assoc()) : ?>
          <option <?php isset($_POST['city']) && $_POST['city'] == $gov['g_name']?'selected':'';?> value="<?php echo $gov['g_name'];?>"> <?php echo $gov['g_name'];?> </option>
        <?php endwhile;?>
        </select>
        </div>
    </div>
    <div class="form-group">
    <br><br>
        <label for="exampleFormControlTextarea4">Address</label>
        <textarea pattern="a-zA-Z0-9\s,." name="address" class="form-control" id="exampleFormControlTextarea4" rows="3" value="<?php echo isset($_POST['address'])?$_POST['address']:'';?>"><?php echo isset($_POST['address'])?$_POST['address']:''; ?></textarea>
    </div>
    <div class="form-group">
         <label>Choose Username :</label>
         <input type="text" pattern="[a-zA-z]{5,15}" class="form-control" name="username" placeholder="Enter Your Username [5:15 chars]"
         required="required" value="<?php echo isset($_POST['username'])?$_POST['username']:'';?>">
    </div>
    <div class="form-group">
         <label>Password :</label>
         <input pattern=".{5,15}" type="password" class="form-control" name="password" placeholder="Enter Your Password [5:15]" required="required">
    </div>
    <div class="form-group">
        <label>Confirm Password :</label>
        <input pattern=".{5,15}"  type="password" class="form-control" name="password2" placeholder="Confirm Password [5:15]" required="required">
    </div>
    <div style="text-align: center;">
                <input name="register" type="submit" value="Submit" class="btn btn-primary">
            </div>

<?php include('includes/footer.php'); ?>
