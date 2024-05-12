<?php
// Database connection details
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

// Connect to database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Initialize variables
$name = '';
$email = '';
$password = '';
$enrollment = '';
$errors = [];
$success_message = '';

// Check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enrollment = $_POST['enrollment'];

    // Form validation
    // Name validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // Enrollment validation
    if (empty($enrollment)) {
        $errors[] = "Enrollment is required";
    }

    // If no errors, insert user data into database
    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, enrollment) VALUES (:name, :email, :password, :enrollment)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':enrollment', $enrollment);
        $stmt->execute();

        // Display success message
        $success_message = "Registration successful! You can now log in.";

        // Clear form fields
        $name = '';
        $email = '';
        $password = '';
        $enrollment = '';
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Registration-IU Placement Cell </title>
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
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form styles */
    form {
        display: flex;
        flex-direction: column;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<body>
    <div class="container">
        <h2>Registration</h2>
        <?php if (!empty($errors)) { ?>
            <div style="color: red;">
                <?php foreach ($errors as $error) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if (!empty($success_message)) { ?>
            <div style="color: green;">
                <p><?php echo $success_message; ?></p>
            </div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Name: <input type="text" name="name" value="<?php echo $name; ?>" required><br>
            Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
            Password: <input type="password" name="password" required><br>
            Enrollment: <input type="text" name="enrollment" value="<?php echo $enrollment; ?>" required><br>
            <input type="submit" name="submit" value="Register">
            <p>have an account? <a href="login.php">Login</a></p>
        </form>
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