<?php
  class Database{

    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $db_name = DB_NAME;

    private $link;
    private $error;

    public function __construct(){
      $this->connect();
    }

    private function connect(){
      $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
      if(!$this->link){
          $this->error = "Connection Failed".$this->error->connect_error.__LINE__;
          return false;
      }
    }

    public function select($query){
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result->num_rows > 0){
        return $result;
      } else {
        return false;
      }
    }

    public function insert($query){
      $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($insert_row){
        return true;
      } else {
        return false;
      }
    }

    public function update($query){
      $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($update_row){
      return true;
      } else {
        return false;
      }
    }

    public function delete($query){
      $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($delete_row){
       return true;
      } else {
        return false;
      }
    }

    public function scan($string){
      return $this->link->real_escape_string($string);

  }
}
