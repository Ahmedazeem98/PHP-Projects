<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/core/init.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Database.php'); ?>
<?php require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/libraries/Users.php'); ?>

<?php



$User = new User;
$users = $User->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    < <title>Gaming Store</title>

<!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../assets/css/custom.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
    <div style="text-align: center;">
     <a href="index.php"><input type="submit" value="Admin" class="btn btn-primary"></a>
    </div>
    <br>

        <?php if($users) : ?>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php while($user = $users->fetch_assoc()) : ?>
                <tr>
                    <td> <?php echo $user['id']; ?> </td>
                    <td> <?php echo $user['first_name'].' '.$user['last_name']; ?> </td>
                    <td> <?php echo $user['username']; ?> </td>
                    <td>
                        <a href="delete_user.php?id=<?php echo $user['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                     </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php else :?>
            <h2 style="text-align:center;">No Usres yet!</h2>
        <?php endif;?>
    </div>
</body>
</html>
