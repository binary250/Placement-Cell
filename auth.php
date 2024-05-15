<?php
session_start();
require_once 'config.php';

// User login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is an admin or a student
    // You'll need to add your own authentication logic here
    if ($email === 'admin@example.com' && $password === 'admin123') {
        // Admin login
        $_SESSION['user_id'] = 1;
        $_SESSION['user_type'] = 'admin';
        header('Location: admin.php');
        exit;
    } else {
        // Invalid login
        $error = 'Invalid email or password';
    }
}