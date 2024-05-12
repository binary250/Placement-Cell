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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Project Team-Placement Cell </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
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

    /* CSS styles go here */
    body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .team-members {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-member {
            flex: 0 0 25%;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s ease;
            max-width: 300px;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            max-width: 100%;
            height: auto;
           aspect-ratio: 1/1;
        }

        .team-member h3 {
            margin: 10px 0;
            color: #333;
        }

        .team-member p {
            margin: 10px;
            color: #666;
        }

        .social-icons {
            margin-bottom: 10px;
        }

        .social-icons a {
            color: #666;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #333;
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

  <div class="container">
    <h1>Our Team</h1>
    <div class="team-members">
      <!-- Team member 1 -->
      <div class="team-member">
        <img src="images/aalam.jpeg" alt="Team Member 1">
        <h3>Mohammad Alam Khan</h3>
        <p>Project Head/Backend Developer</p>
        <div class="social-icons">
          <a href="https://www.instagram.com/aalam.o1/"><i class="fab fa-instagram"></i></a>
          <!--a href="#"><i class="fab fa-linkedin"></i></a-->
          <a href="https://github.com/binary250"><i class="fab fa-github"></i></a>
        </div>
      </div>

      <!-- Team member 2 -->
      <div class="team-member">
        <img src="images/mdAltamash.jpeg" alt="Team Member 2">
        <h3>MD. Altamash</h3>
        <p>Project Lead/Frontend Developer</p>
        <div class="social-icons">
          <a href="https://www.instagram.com/shaikh.altamash.182940/"><i class="fab fa-instagram"></i></a>
          <!--a href="#"><i class="fab fa-linkedin"></i></a-->
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </div>

      <!-- Team member 3-->
      <div class="team-member">
        <img src="images/mohdAshraf.jpeg" alt="Team Member 3">
        <h3>Mohd.Ashraf</h3>
        <p>Database Administrator</p>
        <div class="social-icons">
          <a href="https://www.instagram.com/ashrafshaikh.01/"><i class="fab fa-instagram"></i></a>
          <!--a href="#"><i class="fab fa-linkedin"></i></a-->
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </div>

      <!--Team Memeber 4-->
      <div class="team-member">
        <img src="images/Ahsankhan.jpeg" alt="Team Member 4">
        <h3>Ahsan Khan</h3>
        <p>Frontend Developer</p>
        <div class="social-icons">
          <a href="https://www.instagram.com/ahsanzzz__/"><i class="fab fa-instagram"></i></a>
          <!--a href="#"><i class="fab fa-linkedin"></i></a-->
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add a hover effect to the team members
    const teamMembers = document.querySelectorAll('.team-member');
    teamMembers.forEach(member => {
      member.addEventListener('mouseenter', () => {
        member.style.transform = 'scale(1.05)';
      });
      member.addEventListener('mouseleave', () => {
        member.style.transform = 'scale(1)';
      });
    });
  </script>

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