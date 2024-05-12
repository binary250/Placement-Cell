<?php
// Database connection details
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

// Connect to database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

// Initialize variables
$email = '';
$password = '';
$errors = [];

// Check if form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Form validation
    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If no errors, retrieve user from database
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Login-IU Placement Cell </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins' sans-serif;
        }

        .container-signin {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px;
            box-shadow: rgba(100, 100, 111, 0.2) 0 7px 29px 0;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .navbar {
            height: 90px;
            background-color: hsl(0, 0%, 10%);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo i {
            color: #ffffff;
            font-size: 22px;
        }

        .navbar a {
            font-size: 1rem;
            font-weight: bold;
            color: white;
            margin-left: 12px;
        }
    </style>
</head>


<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <!--i class="fa-solid fa-font-awesome"></i-->
                <a href="home.php"><img src="Images/IntegralUniversityLogo_1.png" height="70px"></a>
            </div>
            <div class="menu">
                <div class="menu-links">
                    <a href="home.php"><i class="fa-solid fa-house" style="color:#FFd43B"></i> &nbsp;Home</a>
                    <li class="dropdown">
                        <a href="#" class="dropbtn"> <i class="fa-solid fa-book" style="color: #FFD43B;"></i> About &nbsp;<i class="fa-solid fa-angle-down" style="color: #FFD43B;"></i> </a>
                        <div class="dropdown-content">
                            <a href="about.php">About Us </a>
                            <a href="members.php">Our Members</a>
                            <!--a href="#">Training Domain</a-->
                        </div>
                    </li>
                    <!--a href="about.html"><i class="fa-solid fa-book" style="color: #FFD43B;"></i> &nbsp; About</a-->
                    <a href="contactus.php"><i class="fa-solid fa-phone" style="color: #FFD43B;"></i> &nbsp;Contact</a>
                    <li class="dropdown">
                        <a href="#"><i class="fa-solid fa-graduation-cap" style="color: #FFD43B;"></i> &nbsp;Placement &nbsp;<i class="fa-solid fa-angle-down" style="color: #FFD43B;"></i></a></a>
                        <div class="dropdown-content">
                            <a href="drives.php">Drives</a>
                            <a href="alumini.php">Alumni</a>
                            <!--a href="#">Interview Prepration Guideline</a-->
                        </div>
                    </li>
                </div>
        </nav>
    </header>
    <div class="container-signin">
        <h2>Login</h2>
        <?php if (isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>
        <?php if (!empty($errors)) { ?>
            <div style="color: red;">
                <?php foreach ($errors as $error) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Email: <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required><br>
            Password: <input type="password" class="form-control" name="password" required><br>
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </form>
        <p>Don't have an account? <a href="registration.php" class="btn btn-primary">Register</a></p>
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