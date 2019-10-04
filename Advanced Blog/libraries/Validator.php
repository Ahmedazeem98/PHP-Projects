<?php 

  class Validator {
     
    // Check all fields is filled
    public function isFilled($fields){
      foreach($fields as $field){
        if(empty($_POST[''.$field.''])){
          return false;
        }
      }
      return true;
    }

    // Validate email
    public function validEmail($email){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
      } else {
        return false;
      }
    }

    // match password
    public function isMatch($pass1, $pass2){
      return $pass1 == $pass2;
    }
  }