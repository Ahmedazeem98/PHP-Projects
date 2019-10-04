<?php require('core/init.php'); ?>
<?php

  $topic = new Topic;
  $validate = new Validator;

  if(isset($_POST['create'])){

    $fields = array('title', 'category', 'body');
    $data = array();

    if($validate->isFilled($fields)){

      $data['title'] = $_POST['title'];
      $data['body'] = $_POST['body'];
      $data['category_id'] = $_POST['category'];
      $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id']: null;
      
      if($topic->create($data)){
        redirect('index.php', 'Topics has been added', 'success');
      }
    } else {
        redirect('create.php', 'Please, fill all fields', 'error');
    }
  }

  $template = new Template('templates/create.php');

  // Assign vars
  $template->topics = $topic->getAllTopics();
  $template->categories = $topic->getAllCategories();

  echo $template;
 ?>
