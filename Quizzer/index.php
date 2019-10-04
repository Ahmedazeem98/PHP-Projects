<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
// get number of questions
$query = "SELECT * FROM questions";
$result = $conn->query($query) or die($conn->error.__LINE__);
$total = $result->num_rows;
$_SESSION['total'] = $total;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <header>
      <div class="container">
        <h1>PHP Quizzer</h1>
      </div>
    </header>
    <main>
      <div class="container">
        <h2>Test your information </h2>
        <p>This is a multiple choice quiz on PHP </p>
        <ul>
          <li> <strong>The number of questions: </strong><?php echo $total; ?></li>
          <li> <strong>Type: </strong>Multiple Choice </li>
          <li> <strong>Estimated Time: </strong><?php echo 0.5 * $total; ?> minutes</li>
        </ul>
        <a href="question.php?n=1" class="start">Start Quiz</a>
      </div>
    </main>
    <footer>
      <div class="container">
        copyright &copy; 2010, PHP Quizzer
      </div>
    </footer>
</body>
</html>
