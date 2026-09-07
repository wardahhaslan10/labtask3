<?php
/*
Course Code & Name: DFP50193 - Web Programming
Full Name: WARDAH BINTI HASLAN
Registration Number: 18DDT23F1099
Class: DDT7B
*/

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "elite_global";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Set character encoding
$conn->set_charset("utf8mb4");
?>