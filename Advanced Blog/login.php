<?php require('core/init.php'); ?>
<?php

$name =$_POST['username'];
$password= md5($_POST['password']);

$user = new User;

if($user->login($name, $password)){

  redirect('index.php', 'You have already logedin', 'success');

} else {
  redirect('index.php', 'Invalid Username or Password', 'error');
}