

<?php
require ('core/init.php');
require ('libraries/Users.php');
require ('libraries/Database.php');
session_start();
$users = new User;
$governorates = get_governorates();
$id;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = ($users->getUserBy_id($id))->fetch_assoc();
}


    if(isset($_POST['edit'])){
        $data = array(
            'mobile' => $_POST['mobile'],
            'city' => $_POST['city'],
            'address' =>$_POST['address'],
        );
    $address = ($data['address']);
    if(!empty($address)){
            $users->update($data);
            header("Location:place_order.php");
    } else{
        ?>
        <script>
             alert("Please Insert your data correctly");
        </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gaming Store</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>
<body>


    <div class="container">
    <h2 style="text-align:center;">Edit Info</h2>

<form action="edit.php" method="POST" role="form">

    <div class="form-group">
        <label>Mobile :</label>
        <input type="text" pattern="[0-9]{11,15}" class="form-control" name="mobile" placeholder="Enter Your mobile"
        required="required" value="<?php echo isset($_SESSION['mobile'])?$_SESSION['mobile']:$_POST['mobile'];?>">
    </div>
    <div class="form-group">
    <br>
        <label for="gender1" class="col-md-2 control-label">Governorates:</label>
        <div class="col-lg-4">
        <select name="city" class="form-control">
        <?php while($gov = $governorates->fetch_assoc()) : ?>
          <option <?php echo $gov['g_name'] == $_SESSION['city'] ?'selected':''; ?>  value="<?php echo $gov['g_name'];?>"> <?php echo $gov['g_name'];?> </option>
        <?php endwhile;?>
        </select>
        </div>
    </div>
    <div class="form-group">
    <br><br>
        <label>Address :</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Your address"
        required="required" value="<?php echo isset($user['address'])?$user['address']:$_POST['address'];?>">
    </div>
    <div style="text-align: center;">
                <input name="edit" type="submit" value="Submit" class="btn btn-primary">
            </div>
</div>

</body>
</html>
