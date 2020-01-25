<?php

    // Get All Categories
    function getAllCategories() {
        $db = new Database;
        return $db->select('SELECT * FROM categories');
    }

    // Get most Popular
    function getMostPopular() {
        $db = new Database;
        return $db->select('SELECT * FROM products WHERE sold > 0  ORDER BY sold DESC');
    }

    function check_quantities($product_id,$quantity){
        $db = new Database;
        $res = ($db->select("SELECT quantity FROM products WHERE id = '$product_id'"))->fetch_assoc();
        if($res['quantity']>=$quantity){
            return $quantity;
        } else{
            return $res['quantity'];
        }

    }

    function get_max_quantity($product_id){
        $db = new Database;
        return ($db->select("SELECT * FROM products WHERE id = '$product_id'"))->fetch_assoc()['quantity'];
    }

    function get_quantity_from_cart($user_id,$product_id){
        $db = new Database;
        $res = $db->select("SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'");
        if(!$res){
            return 0;
    } else{

            return $res->fetch_assoc()['product_quantity'];
        }
    }

    function get_governorates(){
        $db = new Database;
        return $db->select("SELECT * FROM governorates");
    }
    function shipping($x){
      $db = new Database;
      return ($db->select("SELECT shipping FROM governorates WHERE g_name = '$x'"))->fetch_assoc();
    }

    function check($id){
      $db = new Database;
     $res = $db->select("SELECT * FROM products WHERE id = '$id'");
     if($res){
       return 1;
     }else{
       return 0;
     }
   }
