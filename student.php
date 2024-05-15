<?php
session_start();
require_once 'functions.php';

if (!isLoggedIn() || !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $enrollment_number = $_POST['enrollment_number'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $resume = $_FILES['resume']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["resume"]["name"]);
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        $result = insertParticipant($name, $enrollment_number, $department, $email, $phone, $resume);
        if ($result) {
            $success_message = "Application submitted successfully.";
        } else {
            $error_message = "Error submitting application.";
        }
    } else {
        $error_message = "Error uploading the resume.";
    }
}
// ...
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #555;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .message {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <h1>Student Panel</h1>
    <?php if (isset($success_message)) : ?>
        <p><?php echo $success_message; ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <h2>Apply for Placement</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="enrollment_number">Enrollment Number:</label>
        <input type="text" id="enrollment_number" name="enrollment_number" required><br>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone"><br>

        <label for="resume">Resume:</label>
        <input type="file" id="resume" name="resume" required><br>

        <input type="submit" value="Submit">
    </form>
    <a href="logout.php">Logout</a>
</body>

</html>