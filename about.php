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
  <title>About- IU Placement</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="https://www.iul.ac.in/img/logo_circle.ico" />
  <script src="https://kit.fontawesome.com/345bad374b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <style>
    
    .dev {
      background: #e8e8e8;
      padding: 1px 5.5px;
      border: 1px solid lightgrey;
      border-radius: 25px;
      font-size: 11.7px;
    }

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

    h2 {
      text-align: center;
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

  <h1 style="text-align: center;"> About Us</h1>
  <p style="text-align: center; font-size: large; font-weight: 600;">
    Centre for Career Guidance and Development (CCG&D) of Integral University is a central facility of the
    University managed by highly qualified and experienced professionals from industry. It is actively assisting
    the students in developing their personality, enhancing communication skills and general awareness through
    workshops, seminars, Industrial Training and Career Counselling. This ultimately helps them in their final
    placement. High emphasis is paid on building Industry linkages and creating placement opportunities. The
    cell's working is automated and the records of the students' academic status, trainings, seminars, projects
    and placements etc. are available online. <br> <br>
    Acts as a bridge between the corporate world and the University by providing a range of services to enhance
    students job search and career management skills. It also provides career counseling to students.
    Continuously liaisons and networks with organizations and recruiters (Indian and Overseas) to generate ample
    opportunities for the placement of students. <br> <br>
    Provides exposure to the students for training/Internship in public sector or private organizations, both at
    national & International level.
    Improves active participation of the students and the faculty members in placement activities through
    formation of Student Placement Committee (SPCs), faculty committees and online discussion-groups:
    Augments corporate collaborations by signing MOUs for Training and Placement activities.
    Utilizes the latest state-of-the-art technology (web site. ernails, bulk SMS. face book etc) for better
    efficiency
    Utilizes independent and interactive web portals which link the various Job sites and corporate world
    facilitating information sharing with both the students and the Recruiters.
    Encourages entrepreneurship among the students.
    Arranges interactions of students with Alumni members for sharing corporate experiences.
  </p>
  <hr>
  <h2> Facilites for the Recruiters</h2>
  <ul style="font-weight: 600; font-size:large; ">
    <li>The CCG&D team at IU makes every effort to ensure that the process of interaction between the recruiters and the students is conducted smoothly. To this end the university has taken steps to ensure that all necessary infrastructure required for the recruitment process is in place.</li> <br>

    <li>The University is well known for providing excellent hospitality to the recruiters in the University Guest House which has all modern facilities and amenities to ensure a comfortable stay in the campus. Personalized care is provided to the guests staying in the Guest House.</li> <br>
    <li>The Campus is 30 kms from Lucknow Airport & Railway Station. The University provides comfortable Vehicles to pick up and drop the Recruitment team to& from the Airport/Railway Station. Arrangements are also made for local sight-seeing if desired. </li> <br>
    <li>University has created excellent infrastructure keeping in mind the amenities needed for facilitating the recruitment process. </li> <br>
    <li>Seminar Hall equipped with excellent audio-visual facilities and a seating capacity of 400.</li> <br>
    <li>Two Special Lecture Theaters equipped with audio/visual facilities are available for closer interaction between the recruiters and the students. Each lecture theatre, built like an amphitheater, has a seating capacity of 80.</li> <br>
    <li>Class rooms each having seating capacity of 60 students are available for conducting written test in case of pool campus drives. A written test for 1000 students in one shift can comfortably be conducted.</li> <br>
    <li>Air-conditioned Group Discussions/ Conference rooms/ Interview rooms.</li> <br>
    <li> Line test can be conducted in a state-of-the-art Computer labs for almost 1000 students.</li> <br>
    <li> open space / lawn to accommodate a big footfall during pool campus.</li> <br>
    <li>Canteen and health center also available for outside students participating in pool campus</li> <br>
  </ul>
  <img src="images/college.jpeg" height="600px" style="margin-right: 200px;">
  <hr>
  <h2> Placement Policy</h2>
  <ul style="font-weight: 600; font-size:large; ">
    <li>
      Integral follows a “One Student One Job” policy. When a student receives a job offer he/ she will not be allowed to appear for placement process( On /Off Campus) by other companies henceforth.
    </li>
  </ul>
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