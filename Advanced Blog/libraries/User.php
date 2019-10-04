<?php
class User{

//initalize DB Variable
private $db;

// Constructor
public function __construct() {
  $this->db = new Database;
}

  public function register($data){
    // insert data
    $this->db->prepare("INSERT INTO users (about, avatar, email,
        name, password, username)
        VALUES(:about, :avatar, :email, :name, :password, :username)
    ");
    $this->db->bind(':about', $data['about']);
    $this->db->bind(':avatar', $data['avatar']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':username', $data['username']);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function upload_avatar(){

    $allowExtentions = array('gif', "jpeg", "jpg", "png");
    $name = explode(".", $_FILES['avatar']['name']);
    $extention = end($name);
    $type = explode("/", $_FILES['avatar']['type']);
    $type = $type[0];
    if($type == 'image' && in_array($extention, $allowExtentions)){

      if($_FILES['avatar']['error'] != 0){
       redirect('register.php', $_FILES['avatar']['error'], 'error');
      } 
      else {
        if(file_exists("images/avatars/".$_FILES['avatar']['name'])){

          redirect('register.php', 'file already exist', 'error');
        } else {
          move_uploaded_file($_FILES['avatar']['tmp_name'], "images/avatars/"
          .$_FILES['avatar']['name']);
          return true;
        }
      }

    } else {
      // redirect with error 
          return false;

    }
  }

  // check if the user is register
  public function login($username, $password){
    $this->db->prepare('SELECT * FROM users
                WHERE username = :username 
                AND password = :password
    ');
    $this->db->bind(':username', $username);
    $this->db->bind(':password', $password);
    $res = $this->db->singleReselt();

    if($this->db->rowCount() > 0){

      $this->UserDataSet($res);
      return true;

    } else {
      return false;
    }
  }

  // save data to remmember user
  private function UserDataSet($res){

    $_SESSION['is_logged_in'] = true;
    $_SESSION['username'] = $res->username;
    $_SESSION['user_id'] = $res->id;
    $_SESSION['name'] = $res->name;

  }

  public function logout(){
    
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    return true;
  }


}