<?php
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $query;

     public function __construct(){
       // set DSN => Data Source Name
       $dsn = 'mysql:host=' .$this->host .';dbname=' .$this->dbname;

       // Set assert_options
       $options = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
       );
       // Create a PDO instace
         try{
           $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
         }
         catch(PDOException $e){
           $this->error = $e->getMessage();
         }
     }

     public function bind ($parmeter, $value, $type = null){
       if(is_null($type)){
         switch (true) {
           case is_int ($value):
             $type = PDO::PARAM_INT;
             break;
            case is_bool ($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null ($value):
              $type = PDO::PARAM_NULL;
              break;
           default:
              $type = PDO::PARAM_NULL;
              break;
         }
       }
       $this->query->bindValue($parmeter, $value, $type);
     }

     public function prepare($query){
       $this->query = $this->dbh->prepare($query);
     }

     public function execute(){
       return $this->query->execute();
     }

     public function allReselt(){
       $this->execute();
       return $this->query->fetchAll(PDO::FETCH_OBJ);
     }

     public function singleReselt(){
       $this->execute();
       return $this->query->fetch(PDO::FETCH_OBJ);
     }

     public function rowCount(){
       return $this->query->rowCount();
     }

     public function lastId(){
       return $this->dbh->lastInsertId();
     }

  }
 ?>
