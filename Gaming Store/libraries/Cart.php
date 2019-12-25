<?php

  class Cart {

    //initialize DB Variable
    private $db;
    // Constructor
    public function __construct() {
      $this->db = new Database;
    }


    public function getCartItems($user_id) {
      $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
      return $this->db->select($query);

  }

  public function getCartItems_specific($product_id) {
    $query = "SELECT cart.*, products.title,products.price FROM cart
    INNER JOIN products ON product_id = '$product_id'";
    return $this->db->select($query);

}


    public function current_cart_items_for_specific_user($user_id) {
        $query = "SELECT DISTINCT cart.*, products.title,products.price,products.quantity FROM cart
        INNER JOIN users
        ON cart.user_id = '$user_id'
        INNER JOIN products
        ON cart.product_id = products.id";
      return $this->db->select($query);

    }

    public function add_to_cart($user_id,$product_id,$quantity) {
        $query = "SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
        $res = $this->db->select($query);
        if(!$res){
            $query = "INSERT INTO cart (user_id,product_id,product_quantity) values('$user_id','$product_id','$quantity')";
             $this->db->insert($query);
        } else{
            $query = "UPDATE cart SET
            product_quantity = product_quantity +'$quantity'
            WHERE product_id = '$product_id' AND user_id = '$user_id'";
               $this->db->update($query);
        }

    }

    public function delete_item($user_id,$product_id, $quantity) {

      $query = "DELETE FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
      $this->db->delete($query);
  }

  public function check_out($user_id){
    $query ="DELETE FROM cart WHERE user_id = '$user_id'";
    $this->db->delete($query);
  }

  public function update_item($user_id,$product_id,$quantity) {

    $query = "UPDATE cart SET
    product_quantity = '$quantity'
     WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $this->db->update($query);

}

  }
