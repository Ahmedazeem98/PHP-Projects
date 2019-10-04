<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
  // Get Question number
  $number = (int) $_GET['n'];
  $query = "SELECT * FROM questions WHERE question_number = $number";

   // Get result
   $result = $conn->query($query) or die($conn->error.__LINE__);
   $question = $result->fetch_assoc();

   //Get choices
   $query = "SELECT * FROM choices WHERE question_number = $number";
   $choices = $conn->query($query);
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
        <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $_SESSION['total']; ?></div>
        <p class="question">
          <?php echo $question['text']; ?>
        </p>
        <form action="process.php" method="post">
          <ul class="choices">
            <?php while($row = $choices->fetch_assoc()) : ?>
            <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>
          <?php endwhile; ?>
          </ul>
          <input type="submit" value="submit">
          <input type="hidden" name="number" value="<?php echo $number; ?>">
        </form>
      </div>
    </main>
    <footer>
      <div class="container">
        copyright &copy; 2010, PHP Quizzer
      </div>
    </footer>
</body>
</html>
