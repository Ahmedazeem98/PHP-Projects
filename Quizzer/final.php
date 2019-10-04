<?php session_start(); ?>
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
        <h2>You 'ar done!</h2>
        <p>Congrats! you have complete the test</p>
        <p> <strong>Final score:</strong> <?php echo $_SESSION['score']; ?> </p>
        <?php  $_SESSION['score'] = 0; ?>
        <a href="question.php?n=1" class="start">Try Again</a>
      </div>
    </main>
    <footer>
      <div class="container">
        copyright &copy; 2010, PHP Quizzer
      </div>
    </footer>
</body>
</html>
