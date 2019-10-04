<?php
// create connection items
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = 'root';
// connect to database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($conn->connect_error){
  echo 'connection failed '.$conn->connect_error;
  exit();
} else{
  //echo 'connection done!';
}
