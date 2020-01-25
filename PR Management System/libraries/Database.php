<?php

  class Database{
    public $host = DB_HOST;
    public $username = DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;

    public $link; // Connection
    public $error;

    public function __construct(){
      $this->connect();
    }

    private function connect(){
      $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

      if(!$this->link){
          $this->error = "Connection Failed".$this->error->connect_erorr;
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
      $last_id = $this->link->insert_id;
      return $last_id;
    }

    public function update($query){
      $update_row = $this->link->query($query) or die($this->link->error.__LINE__);

      if($update_row){
      } else {
        die('Error : ('.$this->link->errno.')'.$this->link->error.__LINE__);
      }
    }

    public function delete($query){
      $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

      if($delete_row){
      } else {
        die('Error : ('.$this->link->errno.')'.$this->link->error);
      }
    }
  }
