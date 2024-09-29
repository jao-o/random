<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


//CREATE DATABASE task_management;

//USE task_management;

//CREATE TABLE tasks (
  //  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //title VARCHAR(255) NOT NULL,
    //description TEXT NOT NULL,
    //due_date DATE NOT NULL,
    //status VARCHAR(50) DEFAULT 'Pending'
//);
