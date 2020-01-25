<?php

class User {

    //initalize DB Variable
    private $db;
    // Constructor
    public function __construct() {
      $this->db = new Database;
    }

    public function register($data){
      $f_name= ($data['first_name']);
      $l_name= ($data['last_name']);
      $email = $data['email'];
      $mobile = ($data['mobile']);
      $city = ($data['city']);
      $address = ($data['address']);
      $username = ($data['username']);
      $password = ($data['password']);
      $query = "INSERT INTO users(first_name,last_name,username,email,password,mobile,city,address)
       VALUES ('$f_name','$l_name','$username','$email','$password','$mobile','$city','$address')";
       if($this->db->insert($query)){
         return true;
       } else{
         return false;
       }
    }

    public function update($data){

      $mobile = ($data['mobile']);
      $city = ($data['city']);
      $address = $this->db->scan(($data['address']));
      $_SESSION['mobile'] = ($mobile);
      $_SESSION['city'] = ($city);
      $_SESSION['address'] = $address;
      $query = "UPDATE users SET
      mobile = '$mobile',
      city = '$city',
      address = '$address'";
       if($this->db->update($query)){
         return true;
       } else{
         return false;
       }
    }


    // for admin mode
    public function getAllUsers(){
      $query = "SELECT * FROM users";
      return $this->db->select($query);
    }

    public function getUserBy_id($id){
      $query = "SELECT * FROM users WHERE id = '$id'";
      return $this->db->select($query);
    }

    // for admin mode
    public function delete_user($id){
      $query = "DELETE FROM users WHERE id = '$id'";
      $this->db->delete($query);
    }

    public function login($username,$password){
      $password = md5($password);
      $username = $this->db->scan($username);
      $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
      $user_info = $this->db->select($query);
      if($user_info){
        $this->user_data_set($user_info);
        return true;
      } else{
        return false;
      }

    }
      // save data to remember user
  private function user_data_set($data){
    $data = $data->fetch_assoc();
    $_SESSION['is_logged_in'] = true;
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['first_name'] = $data['first_name'];
    $_SESSION['last_name'] = $data['last_name'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['mobile'] = $data['mobile'];
    $_SESSION['city'] = $data['city'];
    $_SESSION['address'] = $data['address'];

  }
  public function logout(){

    unset($_SESSION['is_logged_in']);
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    return true;
  }

  }
