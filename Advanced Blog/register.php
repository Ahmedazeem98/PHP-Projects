<?php require('core/init.php'); ?>
<?php

  $topic = new Topic;
  $user = new User;
  $validate = new Validator;

  $template = new Template('templates/register.php');

  if(isset($_POST['register'])){

    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['password2'] = md5($_POST['password2']);
    $data['about'] = $_POST['about'];
    
    $fields = array('name', 'email', 'username', 'password', 'password2');

    if($validate->isFilled($fields)){

      if($validate->validEmail($data['email'])){
        if($validate->isMatch($data['password'], $data['password2'])){
          
          if($user->upload_avatar()){
            $data['avatar'] = $_FILES['avatar']['name'];
          } else {
            $data['avatar'] = 'noimage.png';
          }
      
          if($user->register($data)){
            redirect('index.php', 'You have registered successfully', 'success');
          } else {
            redirect("index.php", 'Something Wrong try again!', 'error');
          }

        } else{
          redirect('register.php', 'Password does not match', 'error');
        }

      } else{
        redirect('register.php', 'Enter valid Email', 'error');
      }

    } else {
      redirect('register.php', 'fill all fields', 'error');
    }

  }
  $template->topics = $topic->getAllTopics();
  $template->categories = $topic->getAllCategories();

  // View Object Content
  echo $template;
 ?>
