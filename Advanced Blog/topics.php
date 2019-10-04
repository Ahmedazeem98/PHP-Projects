<?php require('core/init.php'); ?>
<?php

  // Create Topic Object
  $topic = new Topic;

  $template = new Template('templates/topics.php');
  
  $category_id = isset($_GET['category']) ? $_GET['category'] : null;
  $user_id = isset($_GET['user']) ? $_GET['user'] : null;

  if(isset($_GET['category'])){
    $template->topics = $topic->getByCategory($category_id);
    $template->title = 'Posts in '. $topic->getCategory($category_id)->name;
  }
  // Assign vars
  else if(isset($_GET['user'])) {
    $template->topics = $topic->getByUser($user_id);
    $template->title = 'Posts by '.$topic->getUser($user_id)->username;
  } 
   else {
    $template->topics = $topic->getAllTopics();
  }
  $template->categories = $topic->getAllCategories();

  // View Object Content
  echo $template;
 ?>
