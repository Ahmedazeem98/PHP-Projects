<?php
  function redirect($page = false, $message = null, $message_type = null){
    $msg;
    if(is_string($page)){
      $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
    if($message != null){
      $_SESSION['message'] = $message;
    }

    if($message_type != null){
      $_SESSION['message_type'] = $message_type;
    }
    header('Location: '.$location);
    exit();
  }

  function dispalyMessage(){
    if(isset($_SESSION['message'])){

        if(isset($_SESSION['message_type'])){

          if($_SESSION['message_type'] == 'error'){
            
            echo '<div class="alert alert-danger">' .$_SESSION['message'] . '</div>';
          }  else { 
            echo '<div class="alert alert-success">' .$_SESSION['message'] . '</div>';
            }
      }
    }
    unset($_SESSION['message_type']);
    unset($_SESSION['message']);
  }