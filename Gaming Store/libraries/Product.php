<?php
  class Product {

    //initialize DB Variable
    private $db;
    // Constructor
    public function __construct() {
      $this->db = new Database;
    }
    // Get all products
    public function getAllProducts() {
      return $this->db->select("SELECT * From products ORDER BY insertion_time DESC");

    }

     // Get Product by ID
     public function getProductByID($id) {
      return $this->db->select("SELECT * FROM products WHERE id= $id");
    }

    public function getAllProducts_byCategory($category_id){
      return $this->db->select("SELECT * FROM products WHERE category_id= $category_id");
    }

    public function most_popular(){
      return $this->db->select('SELECT * FROM products WHERE sold > 0  ORDER BY sold DESC');
    }

    public function search_in_products($name){
      $name = $this->db->scan($name);
      return $this->db->select("SELECT * FROM products WHERE title LIKE '%".$name."%'");
    }
    

    public function delete_product($id) {
     $this->db->delete("DELETE From products WHERE id ='$id'");

    }
    public function update_quantity($product_id,$quantity){
      $query = "UPDATE products SET
        quantity = quantity - '$quantity',
        sold = sold + '$quantity'
        WHERE id = '$product_id'";
        $this->db->update($query);
    }

    public function upload_avatar(){
      $allowExtensions = array('gif', "jpeg", "jpg", "png");
      $name = explode(".", $_FILES['avatar']['name']);
      $extension = end($name);
      $type = explode("/", $_FILES['avatar']['type']);
      $type = $type[0];
      if($type == 'image' && in_array($extension, $allowExtensions)){
        if($_FILES['avatar']['error'] != 0){
         return 'error';
        }
        else {
          if(file_exists("../assets/images/products/".$_FILES['avatar']['name'])){
            return 'exist';
          } else {
            move_uploaded_file($_FILES['avatar']['tmp_name'], "images/avatars/"
            .$_FILES['avatar']['name']);
            return 'added';
          }
        }
      } else {
            return 'error';
      }
    }

  }
