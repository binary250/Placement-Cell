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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Members-IU Placement Cell </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
    <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
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

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .col-md-3 {
            margin: 0;

        }

        .circle img {
            background: linear-gradient(to bottom, lightblue 0%, gray 100%);
            border-radius: 50%;
            height: 13em;
            object-fit: cover;
            padding: 9px;
            width: 13em;
            shape-outside: circle(50%);
        }

        p {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            unicode-bidi: isolate;
        }

        .text-centre {
            float: left;
            width: 25%;
            padding: 5px;
        }

        .circle::after {
            content: "";
            clear: both;
            display: table;
        }

        div {
            display: block;
            unicode-bidi: isolate;
            text-align: center;
        }

        a {
            text-decoration: none !important;
            color: black;
        }

        a:hover {
            color: #FFD43B;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 500px) {
            .text-centre {
                width: 100%;
            }
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
            <h1 style="text-align: center;">Team members of CCG&amp;D</h1>
            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Dr.Nilanjan" src="Images/Dr_Nilanjan.jpg">
                </div>
                <div class="con">
                    <h4> Dr. Nilanjan Mukherji
                        <br>
                        Director of CCG&amp;D
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:dirccgnd@iul.ac.in">dirccgnd@iul.ac.in</a> </strong>
                    </p>
                </div>
            </div>
            &nbsp;
            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Mohammad Sahnawaz" src="https://www.iul.ac.in/images/users/A00031.jpg">
                </div>
                <div class="con">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mohammad Shahnawaz
                        <br>
                        Placement - Management / Diploma
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:shanawaz@iul.ac.in">shanawaz@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Dr.Sufia Rehman" src="https://www.iul.ac.in/images/users/A00082.jpg">
                </div>
                <div class="con">
                    <h4> Dr.Sufia Rehman
                        <br>
                        Training & Career Guidance
                        <br>
                        International Placements /BT/ME
                        <br>
                        International Higher Studies
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:sufia@iul.ac.in">sufia@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Mohd. Amir Khan" src="https://www.iul.ac.in/images/users/A00153.jpg">
                </div>
                <div class="con">
                    <h4>Mohd. Amir Khan
                        <br>
                        Placement-CSE/ECE/ESE/CA/Mgmt.
                        <br>
                        Website Online Management
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:amirkhan@iul.ac.in">amirkhan@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>


            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Shaz Alam" src="https://www.iul.ac.in/images/users/A00201.jpg">
                </div>
                <div class="con">
                    <h4>Shaz Alam
                        <br>
                        Aptitude Trainer
                        <br>
                        Public Sector opportunities
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:shazalam@iul.ac.in">shazalam@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Ayaz Mahmood" src="https://www.iul.ac.in/images/users/A00358.jpg">
                </div>
                <div class="con">
                    <h4>Ayaz Mahmood
                        <br>
                        Aptitude Trainer
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:ayazm@iul.ac.in">ayazm@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Huma Iqbal" src="https://www.iul.ac.in/images/users/A00383.jpg">
                </div>
                <div class="con">
                    <h4>Huma Iqbal
                        <br>
                        English Language Trainer
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:humaiqbal@iul.ac.in">humaiqbal@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Mohammad Khalid Faheem" src="https://www.iul.ac.in/images/users/A00088.jpg">
                </div>
                <div class="con">
                    <h4>Mohammad Khalid Faheem
                        <br>
                        Data Management
                        <br>
                        office Co-ordination
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:mkfaheeml@iul.ac.in">mkfaheem@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>

            <div class="col-md-3 text-centre">
                <div class="circle">
                    <img class="img-responsive img-circle" alt="Mohd Adnan Shafey" src="https://www.iul.ac.in/images/users/A00379.jpg">
                </div>
                <div class="con">
                    <h4>Mohd Adnan Shafey
                        <br>
                        Executive MIS
                        <br>
                        Coordinator Industry Relation
                    </h4>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <strong> <a href="mailto:mkshafey@iul.ac.in">mshafey@iul.ac.in</a></strong>
                    </p>
                </div>
            </div>
        </main>

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