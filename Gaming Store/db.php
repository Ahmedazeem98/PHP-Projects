
<?php

/*$conn = new mysqli('localhost', 'root','');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS gamingstore";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating database: " . $conn->error;
}

$conn = new mysqli('localhost', 'root', '','gamingstore');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS `cart` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `product_quantity` int(11) NOT NULL,
    PRIMARY KEY (`id`))";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table cart: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `categories` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 PRIMARY KEY (`id`))";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table categories: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS `orders` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `product_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `transaction_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `address` varchar(255) NOT NULL,
    `mobile` varchar(20) NOT NULL,
    `city` varchar(25) NOT NULL,
    `state` varchar(25) NOT NULL,
    PRIMARY KEY (`id`))";
   if (!$conn->query($sql) === TRUE) {
       echo "Error creating table orders: " . $conn->error;
   }

   $sql = "CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `category_id` int(11) NOT NULL,
    `title` varchar(100) NOT NULL,
    `quantity` int(11) NOT NULL,
    `sold` int(11) NOT NULL DEFAULT 0,
    `description` text NOT NULL,
    `image` varchar(100) NOT NULL DEFAULT 'noimage.jpg',
    `price` decimal(10,2) NOT NULL,
    `insertion_time` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`))";
   if (!$conn->query($sql) === TRUE) {
       echo "Error creating table products: " . $conn->error;
   }


   $sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`))";
   if (!$conn->query($sql) === TRUE) {
       echo "Error creating table users: " . $conn->error;
   }
   */
   ?>
