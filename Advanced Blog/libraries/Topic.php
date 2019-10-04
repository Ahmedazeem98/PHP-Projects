<?php
  class Topic {
    //initalize DB Variable
    private $db;

    // Constructor
    public function __construct() {
      $this->db = new Database;
    }

    // Get all topics
    public function getAllTopics() {
      $this->db->prepare("SELECT topics.*, users.username, users.avatar, categories.name 
      FROM topics
                        INNER JOIN users
                        ON  topics.user_id = users.id
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        ORDER BY create_date DESC
      ");
      return $res = $this->db->allReselt();
    }

    // Get All Categories
    public function getAllCategories() {
      $this->db->prepare('SELECT * FROM categories');
      return $res = $this->db->allReselt();
    }

    // get topics by category
    public function getByCategory ($category_id){
      $this->db->prepare("SELECT topics.*, users.username, users.avatar, categories.name 
      FROM topics
                        INNER JOIN users
                        ON  topics.user_id = users.id
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        WHERE topics.category_id = :category_id
                        ORDER BY create_date DESC
      ");
      $this->db->bind(':category_id', $category_id);
      return $result = $this->db->allReselt();;
    }


    // Get Total Numbers of categories
    public function getTotalCategories(){
      $this->db->prepare("SELECT * FROM categories");
      $res = $this->db->allReselt();
      return $this->db->rowCount();
    }

      // Get category by Id
      public function getCategory($category_id){
        $this->db->prepare('SELECT * FROM categories WHERE id = :category_id');
        $this->db->bind(':category_id', $category_id);
        return $res = $this->db->singleReselt();
      }

       // Get Topic by Topics Id
       public function getTopic($topic_id){
        $this->db->prepare('SELECT topics.*, users.name, users.avatar, users.username
        FROM topics
                    INNER JOIN users
                    ON topics.user_id = users.id
                    WHERE topics.id = :topic_id
        
        ');
        $this->db->bind(':topic_id', $topic_id);
        return $res = $this->db->singleReselt();
      }

      // Get Reply by Topic ID 
      public function getReply($topic_id){
        $this->db->prepare('SELECT replies.*, users.* FROM replies
          INNER JOIN users 
          ON replies.user_id = users.id
          WHERE replies.topic_id = :topic_id
          ORDER BY create_date ASC
        ');
        $this->db->bind(':topic_id', $topic_id);
        return $res = $this->db->allReselt();
      }

      // Get topics by user id 
      public function getByUser ($user_id){
        $this->db->prepare("SELECT topics.*, categories.name, users.username, users.avatar
        FROM topics
                          INNER JOIN users
                          ON  topics.user_id = users.id
                          INNER JOIN categories
                          ON topics.category_id = categories.id 
                          WHERE topics.user_id = :user_id
                          ORDER BY create_date DESC
        ");
        $this->db->bind(':user_id', $user_id);
        return $result = $this->db->allReselt();
      }

      public function getUser($user_id){
        $this->db->prepare('SELECT * FROM users WHERE id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->singleReselt();
      }

      // Get total number of users 
       // Get Total Numbers of Categories
    function usresNumbers(){
      $this->db->prepare("SELECT * FROM users");
      return $result = $this->db->rowCount($this->db->allReselt());
    }

    public function create($data){
      
      $this->db->prepare("INSERT INTO topics (title, body, category_id, user_id)
          VALUES(:title, :body, :category_id, :user_id)
      ");
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':category_id', $data['category_id']);
      $this->db->bind(':user_id', $data['user_id']);

      if($this->db->execute()){
        return true;

      } else {
        return false;
      }
    }

    public function addReply($data){
      $this->db->prepare("INSERT INTO replies (body, topic_id, user_id)
          VALUES(:body, :topic_id, :user_id)
      ");
      $this->db->bind(':body', $data['reply']);
      $this->db->bind(':topic_id', $data['topic_id']);
      $this->db->bind(':user_id', $data['user_id']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  
  }
