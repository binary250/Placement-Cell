<?php
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Database connection details
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

// Connect to database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Retrieve user data from database
if ($isLoggedIn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="/___vscode_livepreview_injected_script"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<style>
    .login-button {
        font-weight: 100;
        padding: 12px 22px;
        background-color: transparent;
        color: #999999;
        border-radius: 10px;
        border: 3px solid #008075;
        transition: 0.2s;
    }

    .login-button a {
        text-decoration: none;
        color: #ffffff;
    }

    .login-button:hover {
        background-color: rgb(7, 7, 96);
        color: white;
        text-decoration: none;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }



    @media (max-width: 53rem) {
        .menu {
            display: none;
        }

        .menu-btn {
            display: block;
        }
    }

    .contact-page-map {
        margin-top: 36px;
    }

    section {
        padding: 60px 0;
        min-height: 100vh;
    }

    .contact-info {
        display: inline-block;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }


    .contact-info-icon {
        margin-bottom: 15px;
    }

    .contact-info-item {
        background: #ffffff;
        padding: 30px 0px;
    }


    .contact-info-icon i {
        font-size: 48px;
        color: #4000ca;
    }

    .contact-info-text p {
        margin-bottom: 0px;
    }

    .contact-info-text h2 {
        color: #000000;
        font-size: 22px;
        text-transform: capitalize;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .contact-info-text span {
        color: #000000;
        font-size: 16px;
        display: inline-block;
        width: 100%;
    }

    .dev {
  background: #e8e8e8;
  padding: 1px 5.5px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  font-size: 11.7px;
}
</style>

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
                <div style="text-align: right;">
                    <?php if ($isLoggedIn) { ?>
                        <a href="myaccount.php" class="login-button"><?php echo $user['name']; ?><i class="fa-solid fa-angle-down" style="color: #FFD43B;"></i> </a>
                    <?php } else { ?>
                        <a href="login.php" class="login-button">Login&nbsp;<i class="fa-solid fa-right-to-bracket fa-xs" style="color: #f3f4f7;"></i></a>
                    <?php } ?>
                </div>
                <div class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
        </nav>
    </header>

    <section class="contact-page-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>Director CCG&D
                                    (Training, Placement & Corporate Relations)
                                    Integral University</h2>
                                <span>Dasauli, Kursi Road, </span>
                                <span>Lucknow - 226026 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>E-mail</h2>
                                <span><a href="mailto:dirccgnd@iul.ac.in" target="_blank"><span>dirccgnd@iul.ac.in</span></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>office time</h2>
                                <span>Mon - Thu 9:00 am - 4.00 pm</span>
                                <span>Thu - Mon 10.00 pm - 5.00 pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="col-md-4">
                <div class="contact-page-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.266648395211!2d80.99665617522604!3d26.958453976619882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399957d74f586c77%3A0x4b4082bb8f3bef03!2sIntegral%20University!5e0!3m2!1sen!2sin!4v1707933283059!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        </div>
    </section>

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