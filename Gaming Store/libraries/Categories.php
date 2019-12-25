<?php
  class Categories {

    //initalize DB Variable
    private $db;
    // Constructor
    public function __construct() {
      $this->db = new Database;
    }
    // Get all products
    public function getAllCategories() {
      return $this->db->select("SELECT * From products ORDER BY insertion_time DESC");

    }

     // Get Product by ID
     public function getCategoryByID($id) {
      return $this->db->select("SELECT * FROM categories WHERE id= $id");
    }

    public function getAllProducts_byCategory($category_id){
      return $this->db->select("SELECT * FROM products WHERE category_id= $category_id");
    }

    public function most_popular(){
      return $this->db->select('SELECT * FROM products WHERE sold > 0  ORDER BY sold');
    }
    public function add_category($name){
      return $this->db->select("INSERT INTO categories VALUES('$name')");
    }
    public function delete_category($id){
      $this->db->select("DELETE From categories WHERE id = '$id'");
    }

  }
