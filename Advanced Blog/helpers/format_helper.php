<?php

  function urlFormat($var){
    $var = preg_replace("/\s*/",'',$var);
    $var = strtolower($var);
    return urlencode($var);
  }

  function dateFormat($var){
    return date('F j, g:i, A ', strtotime($var));
  }


  function is_active($category){
    if(isset($_GET['category'])){
      if($_GET['category'] == $category){
        return 'active';
      } else {
        return '';
      }
    } else {
        if($category == null){
          return 'active';
        }
    }
  }
 ?>
