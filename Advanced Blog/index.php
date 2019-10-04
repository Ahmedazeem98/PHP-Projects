<?php require('core/init.php'); ?>
<?php

  // Create Topic Object
  $topic = new Topic;

  $template = new Template('templates/frontpage.php');

  // Assign vars
  $template->topics = $topic->getAllTopics();
  $template->categories = $topic->getAllCategories();
  $template->users = $topic->usresNumbers();
  // View Object Content
  echo $template;
 ?>
