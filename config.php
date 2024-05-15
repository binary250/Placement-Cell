<?php
$host = 'localhost'; // MySQL host
$user = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'participant'; // MySQL database name

// Create a MySQL connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}