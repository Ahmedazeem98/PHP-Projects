<?php require('core/init.php'); ?>
<?php

  $topic = new Topic;
  $template = new Template('templates/topicc.php');

  $topic_id = isset($_GET['id']) ? $_GET['id'] : null ;
  $validate = new Validator;
  if(isset($_POST['add_reply'])){

    $fields = array('reply');

    $data = array();
    $data['reply'] = $_POST['reply'];
    $data['topic_id'] = $topic_id;
    $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id']: null;

    if($validate->isFilled($fields)){

      if($topic->addReply($data)){

        redirect('topic.php?id='.$topic_id);
      } else {
        redirect('topic.php?id='.$topic_id, 'Please, fill all fields', 'error');
      }
    }
  }


   // Assign vars
   $template->myTopic = $topic->getTopic($topic_id);
   $template->categories = $topic->getAllCategories();
   $template->replies = $topic->getReply($topic_id);
   // View Object Conten
  echo $template;
 ?>
