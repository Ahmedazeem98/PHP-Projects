<?php

  function replyCounter($topic_id){
    $db = new Database;
    $db->prepare('SELECT * FROM replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id', $topic_id);
    $db->allReselt();
    return $db->rowCount();

  }

  // get number of topics per category
    function catTopics($category_id){
      $db = new Database;
      $db->prepare('SELECT * FROM topics WHERE category_id = :category_id');
      $db->bind(':category_id', $category_id);
      return $result = $db->rowCount($db->allReselt());;
    }

    // Get Total Numbers of topics
    function getTotalTopcis(){
      $db = new Database;
      $db->prepare("SELECT * FROM topics");
      return $result = $db->rowCount($db->allReselt());
    }

    // Get Total Numbers of Categories
    function getTotalCategories(){
      $db = new Database;
      $db->prepare("SELECT * FROM categories");
      return $result = $db->rowCount($db->allReselt());
    }

    // Count Total posts for specific
    function postsCounter($user_id){
      $db = new Database;
      $db->prepare('SELECT * FROM topics WHERE
        topics.user_id = :user_id
      ');
      $db->bind('user_id', $user_id);
      return $db->rowCount($db->allReselt());
    }
    
 ?>
