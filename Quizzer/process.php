<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
  //Check if the score is set
  if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
  }

  if($_POST){
    $selected_choice = $_POST['choice'];
    $number = $_POST['number'];
    $next = $number + 1;

    // Get the correct answer
    $query = "SELECT * FROM choices WHERE question_number = $number
    AND correct = 1";

    // Get result
    $result = $conn->query($query) or die($conn->error.__LINE__);

    // Get row
    $row = $result->fetch_assoc();

    // Set the correct choice
    $correct_choice = $row['id'];

    // Check if the Choice is correct or not
    if($correct_choice == $selected_choice){
      $_SESSION['score']++;
    }

    // Check if this is a final Question
    if($number == $_SESSION['total']){
      header("Location: final.php");
      exit();
    } else{
      header("Location: question.php?n=".$next);
    }

  }
 ?>
