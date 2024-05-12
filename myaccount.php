<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection details
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

// Connect to database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Retrieve user data from database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .account-info {
            margin-bottom: 30px;
        }

        .account-info p {
            margin: 10px 0;
            color: #555;
            font-size: 1.2em;
        }

        .account-info strong {
            font-weight: bold;
            color: #333;
        }

        .logout-btn {
            display: block;
            width: 120px;
            margin: 0 auto;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .logout-btn:hover {
            background-color: red;
        }

        .dev {
            background: #e8e8e8;
            padding: 1px 5.5px;
            border: 1px solid lightgrey;
            border-radius: 25px;
            font-size: 11.7px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>My Account</h2>
        <div class="account-info">
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Enrollment:</strong> <?php echo $user['enrollment']; ?></p>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <footer class="footer">
        <div class="footer-left col-md-4 col-sm-6">
            <p class="about">
                <span> About the Placement Cell </span>
                Centre for Career Guidance and Development (CCG&D) of Integral University is a central facility of the
                University managed by highly qualified and experienced professionals from industry. It is actively
                assisting
                the students in developing their personality, enhancing communication skills and general awareness through
                workshops, seminars, Industrial Training and Career Counselling. This ultimately helps them in their final
                placement. High emphasis is paid on building Industry linkages and creating placement opportunities. The
                cell's working is automated and the records of the students' academic status, trainings, seminars,
                projects
                and placements etc. are available online.

            </p>
            <div class="icons">
                <a href="https://www.facebook.com/integralunilko/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://twitter.com/IntegralUnilko"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/integralunilko_official?igshid=e8ra2o9tnrfc"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-center col-md-4 col-sm-6">
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p><span> Dasauli,</span> Kursi Road, Lucknow - 226026</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p> (+91) 9918246056</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:dirccgnd@iul.ac.in">dirccgnd@iul.ac.in</a></p>
            </div>
        </div>
        <div class="footer-right col-md-4 col-sm-6">
            <img src="Images/IntegralUniversityLogo_1.png" style="width: 70%;">
            <p class="menu">
                <a href="home.php"> Home</a> |
                <a href="about.php"> About</a> |
                <a href="drives.php"> Placement</a> |
                <a href="contactus.php"> Contact</a> |
            </p>
            <p class="name"> Integral University Placement Cell &copy; 2024</p>
            <br>
            <span class="dev" data-sider-select-id="9ffd9476-87c0-4ff2-ae87-8e300df1e743"> Developed By <b>

                    <a href="team.php">Project Team</a></b>
        </div>
    </footer>
</body>

</html>