<?php
require_once 'config.php';

// Function to check if the user is logged in
function isLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

// Function to get the participant details
function getParticipants() {
    global $conn;
    $query = "SELECT * FROM participants";
    $result = $conn->query($query);
    return $result;
}

// Function to insert a new participant
function insertParticipant($name, $enrollment_number, $department, $email, $phone, $resume) {
    global $conn;
    $query = "INSERT INTO participants (name, enrollment_number, department, email, phone, resume) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $name, $enrollment_number, $department, $email, $phone, $resume);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}