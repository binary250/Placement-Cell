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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni-IU</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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

        body {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            height: 60px;
            background-color: hsl(0, 0%, 10%);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "Poppins", sans-serif;
        }

        .navbar .logo i {
            color: #ffffff;
            font-size: 22px;
        }

        .navbar .logo a {
            font-size: 24px;
            font-weight: 700;
            color: white;
            margin-left: 12px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .menu-links {
            display: flex;
            gap: 24px;
            border-right: 1px solid #ffffff;
            padding-inline: 24px;
        }

        .menu-links a {
            font-weight: 500;
            color: #ffffff;
            padding: 8px 16px;
        }

        .menu-links a:hover {
            color: rgb(221, 181, 88);
        }

        .log-in {
            font-weight: 500;
            padding: 12px 22px;
            background-color: transparent;
            color: #999999;
            border-radius: 10px;
            border: 2px solid #008075;
            transition: 0.2s;
        }

        .log-in a {
            text-decoration: none;
            color: #ffffff;
        }

        .log-in:hover {
            background-color: rgb(7, 7, 96);
            color: white;
            text-decoration: none;
        }

        .menu-btn {
            font-size: 32px;
            color: white;
            display: none;
            cursor: pointer;
        }

        @media (max-width: 53rem) {
            .menu {
                display: none;
            }

            .menu-btn {
                display: block;
            }
        }


        li a,
        .dropbtn {
            display: inline-block;
            color: rgb(221, 181, 88);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover,
        .dropdown:hover .dropbtn {
            color: rgb(221, 181, 88);

        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: rgb(18, 35, 120);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .box {
            max-width: 100%;
            min-height: auto;
            padding: 10px;

            background: rgb(11, 16, 69);
        }

        .heading {
            text-align: center;
            color: #FFD43B;
            font-family: "Poppins", sans-serif;
        }

        .card-img-top {
            width: 60%;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card {
            padding: 1.5em 0.5em 0.5em;
            text-align: center;
            border-radius: 2em;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            float: left;
            margin-top: 30px;
            margin-left: 75px;

        }

        .card-title {
            font-weight: bold;
            font-size: 1.5em;
            font-family: "Poppins", sans-serif;
        }

        .card img {
            border-radius: 50%;
            height: 13em;
            object-fit: cover;
            width: 13em;
            shape-outside: circle(50%);

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
    <main>
        <div class="box">
            <div class="heading">
                <h1> Integral University Alumni &nbsp; <i class="fa-solid fa-graduation-cap" style="color: #FFD43B;"></i></h1>
                <p>SOME PROMINENTLY PLACED STUDENTS</p>
            </div>
        </div>
        </div>
        <hr>
        <div class="card" style="width: 25em;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Abbas%20Mehdi%20Zaidi%20Amazon%20Hyderabad.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Abbas Mehdi Zaid</h5>
                <p class="card-text">Amazon Hyderabad</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Ali%20Anas%20Khan%20Indian%20Navy.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Ali Anas Khan</h5>
                <p class="card-text">Indian Navy</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Amber%20Seth%20Marine%20Engineer%20at%20ANGLO%20Eastern%20Univan%20GROUP.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Amber Seth Marine</h5>
                <p class="card-text">Engineer at ANGLO Eastern Univan GROUP</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Anam%20Relaince%20Jio%20Mumbai.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anam</h5>
                <p class="card-text">(Relaince Jio Mumbai)</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Faisal%20%20Bernhard%20Schulte%20Ship%20Management%20(BSM),Germany.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Faisal</h5>
                <p class="card-text">Bernhard Schulte Ship Management (BSM),Germany</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Richa%20Mishra%20Sopra%20Steria%20Noida.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Richa Mishra</h5>
                <p class="card-text">Sopra Seria Noida</p>
            </div>
        </div>

        <div class="card 7" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Sara%20Sayeed%20Aon%20Hewitt%20Bangalore.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sara Sayeed</h5>
                <p class="card-text">Aon Hewitt Bangalore</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Sadaf%20Badar%20Cerner%20Bangalore.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sadaf Badar</h5>
                <p class="card-text">Cerner Bangalore</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Syed%20Ashhad%20Deolitte%20Gurgaon.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Syed Ashhad</h5>
                <p class="card-text">Deollite Gurgaon</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Shantanu%20IBM%20Bangalore.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Shantanu</h5>
                <p class="card-text">IBM Bangalore</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Sheerin%20Zubaeri%20Musigma%20Bangalore.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sheerin Zubaeri</h5>
                <p class="card-text">Musigma Bangalore</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Syed%20Zaid%20Ahmad%20Ericsson%20Gurgaon.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Syed Zaid Ahmad</h5>
                <p class="card-text">Ericsson Gurgaon</p>
            </div>
        </div>

        <div class="card" style="width: 25rem;">
            <img src="https://www.iul.ac.in/ccgnd/images/picsofalumni/Syed%20Zuman%20Amazon%20Chennai.jpg" style="width: 50%;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Syed Zuman</h5>
                <p class="card-text">Amazon Chennai</p>
            </div>
        </div>

        <!--footer class="footer">
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
        </footer-->
</body>

</html>