<?php
session_start();
require_once 'functions.php';

if (!isLoggedIn() || $_SESSION['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$participants = getParticipants();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Admin Panel</h1>
    <h2>Participant Details</h2>
    <table>
    <tr>
        <th>Name</th>
        <th>Enrollment Number</th>
        <th>Department</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Resume</th>
        <th>Applied On</th>
    </tr>
    <?php while ($row = $participants->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['enrollment_number']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['resume']; ?></td>
            <td><?php echo $row['applied_on']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
    <a href="logoutadmin.php">Logout</a>
</body>

</html>