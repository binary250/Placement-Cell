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
  <title> Home-IU Placement Cell </title>
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

    .button {
      background-color: hsl(0, 0%, 10%);
      border: none;
      color: #FFD43B;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      width: max-content;
      font-size: 16px;
      margin: px 2px;
      cursor: pointer;
    }

    @media (min-width: 576px) {
      .col-sm-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
      }
    }

    .circle {
      width: 200px;
      border-radius: 10%;
      border: 3px solid black;
    }

    .dev {
      background: #e8e8e8;
      padding: 1px 5.5px;
      border: 1px solid lightgrey;
      border-radius: 25px;
      font-size: 11.7px;
    }

    .dev a:hover{
      color: blue;
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
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <marquee style="margin-top: 0px!important; opacity:1.0; width:100%; padding:0;color: #000000;" onmouseover="this.stop()" onmouseout="this.start()">
      <b>Welcome to <span style="color: rgb(13, 1, 149);">Integral University </span> placement cell &nbsp; || Enroll for the interview || </b>
    </marquee>
    <div class="container-overlay">
      <div class="image-overlay">
        <div class="gradient-overlay"></div>
        <img src="Images/Back_Img_Mor.jpg" style=" background: linear-gradient(rgb(42, 0, 42, 0.8), rgb(142, 42, 72, 0.8)),">
        <div class="text-container">
          <p>Centre for Career Guidance and Development (CCG&D) of Integral University is a central facility of the
            University managed by highly qualified and experienced professionals from industry. It is actively assisting
            the students in developing their personality, enhancing communication skills and general awareness through
            workshops, seminars, Industrial Training and Career Counselling. This ultimately helps them in their final
            placement. High emphasis is paid on building Industry linkages and creating placement opportunities. The
            cell's working is automated and the records of the students' academic status, trainings, seminars, projects
            and placements etc. are available online.</p>
        </div>
        <div class="logo-container">
          <img src="Images/Integral_University,_Lucknow_logo.png" alt="iulogo">
        </div>
      </div>
    </div>

    <div class="container-fluid message wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
      <h2 style="text-align:center; margin-left:150px; font-size: 2.1em;" class="principal"><u><br>Message from the
          Director's Desk</u></h2>
      <div class="row">
        <div class="col-sm-3">
          <img src="Images/Dr_Nilanjan.jpg" class="msgphoto" width="70%" style="margin-top:30px; margin-left: 25px;">
          <p style="text-align: center; font-weight: 600;"> Dr.Nilanjan Mukherji
          </p>
          <p style="text-align:center; margin-top:-15px!important; margin-right: 20px;"><b style=" color:black!important;">Director
              CCG&amp;D
            </b></p>
        </div>

        <div class="col-sm-9">
          <p style="margin-right:2%; margin-top:3% ">
            <b>A warm welcome to all of you to an institute of excellence called <span style="color: rgb(13, 1, 149);">Integral University.</span> The Centre for Career Guidance & Development
              (CCG&D) literally personifies its name & spirit.We firmly believe that each student is special and
              blessed in her/his own unique way. The CCG&D team identifies their strengths through systematic
              interventions & works continuously to ensure that individual student goals are met. Preparing & exposing
              the students to varied opportunities, across private sector, govt. sector, further education,
              international options as well as entrepreneurship remains our constant endeavor.<br>
              <br>
              The University places special emphasis on inculcating corporate values and skills required for complex
              professionalism, besides developing superior expertise on functional domains and garnering professional
              knowledge. Students from Integral University, Lucknow today serve with distinction in senior positions
              across the world.<br>
              <br>
              We live by our motto: <em><span style="color: rgb(13, 1, 149);">possibilities ... enabling growth.</span>
              </em>


          </p>
        </div>
        <div class="brands-list">
          <h3 style="text-align: center; font-size: 2.2em;"> CENTER FOR CAREER GUIDANCE & DEVELOPMENT PROMINENT
            RECRUITERS</h3>
          <div class="wraper">
            <img src="Images/infosys-logo-PNG.png" alt="infosys">
            <img src="Images/BHARTIARTL.NS_BIG-b14bd7aa.png" alt="airtel">
            <img src="Images/tata.png" tata">
            <img src="Images/png-transparent-accenture-hd-logo.png" alt="accenture">
            <img src="Images/amazon.png" alt="amazon">
            <img src="Images/axis bank.png" alt="axis">
            <img src="Images/tcs.png" alt="tcs">
            <img src="Images/tech mahindra.png" alt="tech mahindra">
            <img src="Images/jd.png" alt="just dial">
            <img src="Images/infosys-logo-PNG.png" alt="infosys">
            <img src="Images/BHARTIARTL.NS_BIG-b14bd7aa.png" alt="airtel">
            <img src="Images/tata.png" alt="tata">
            <img src="Images/png-transparent-accenture-hd-logo.png" alt="accenture">
            <img src="Images/amazon.png" alt="amazon">
            <img src="Images/axis bank.png" alt="axis">
            <img src="Images/tcs.png" alt="tcs">
            <img src="Images/tech mahindra.png" alt="tech mahindra">
            <img src="Images/jd.png" alt="just dial">
          </div>
        </div>

        <div class="home-container">
          <div class="home-row">
            <div class="col-lg-12 " align="center" style="padding:20px;
            margin:auto">

              <h1 style=" font-weight:300;font-family:Poppins;font-size:2.3em;text-align:center;"><u><b>Team
                    Members</b></u></h1><br>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-3" align="center" style="padding:20px;margin:auto;">
                  <img class="img img-circle" src="Images/Dr_Nilanjan.jpg" height="150px" width="150px" style="border: 3px solid black;height:150px;width:156px;position:relative;box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);-moz-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);-webkit-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);">
                  <h3 style="padding-top:10px;margin-top:2%">Director</h3>
                  <h4 style="font-weight:bold"> Dr. Nilanjan Mukherji
                  </h4>
                  <!--<p style="padding-left:20px;
                                  padding-right:20px;"></p>-->
                  <i class="fa fa-envelope"></i>
                  <strong> <a href="mailto:dirccgnd@iul.ac.in"> dirccgnd@iul.ac.in</a></strong>
                </div>

                <div class="col-lg-3" align="center" style="padding:20px;
                                                                 margin:auto">
                  <img class="img img-circle" src="https://www.iul.ac.in/images/users/A00031.jpg" height="150px" width="150px" style="border: 3px solid black;height:150px;width:156px;
        position:relative;
        box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -moz-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -webkit-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);">
                  <h3 style="padding-top:10px">
                    Placement - Management / Diploma
                    Admin</h3>
                  <h4 style="font-weight:bold"><a href="https://www.linkedin.com/in/mukulyadavvvv" target="_blank" style="color:#000000!important;">Mohmmad Shahnawaz</a></h4>
                  <!--<p style="padding-left:20px;
                padding-right:20px;"></p>-->
                  <i class="fa fa-envelope"></i>
                  <strong> <a href="mailto:shanawaz@iul.ac.in">shanawaz@iul.ac.in</a></strong>
                </div>
                <div class="col-lg-3" align="center" style="padding:20px;
                                                                 margin:auto">
                  <img class="img img-circle" src="https://www.iul.ac.in/images/users/A00088.jpg" height="150px" width="150px" style="border: 3px solid black;height:150px;width:156px;
        position:relative;
        box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -moz-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -webkit-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);">
                  <h3 style="padding-top:10px">Data Management <br>
                    office Co-ordination</h3>
                  <h4 style="font-weight:bold">Mohammad Khalid Faheem</h4>
                  <!--<p style="padding-left:20px; padding-right:10px;"></p>-->
                  <i class="fa fa-envelope"></i>
                  <strong> <a href="mailto:mkfaheeml@iul.ac.in">mkfaheem@iul.ac.in</a></strong>
                </div>
                <div class="col-lg-3" align="center" style="padding:20px;
                                                                 margin:auto">
                  <img class="img img-circle" src="https://www.iul.ac.in/images/users/A00379.jpg" height="150px" width="150px" style="border: 3px solid black;height:150px;width:156px;
        position:relative;
        box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -moz-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);
        -webkit-box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.63);">
                  <h3 style="padding-top:10px">Executive MIS <br>
                    Coordinator Industry Relation</h3>
                  <h4 style="font-weight:bold">Mohd Adnan Shafey</h4>
                  <p style="padding-left:20px; padding-right:10px;"></p>
                  <i class="fa fa-envelope"></i>
                  <strong> <a href="mailto:mkshafey@iul.ac.in">mshafey@iul.ac.in</a></strong>
                </div>
                <a href="members.html" class="button" style="margin-left: 50%;height: 50px;transform: translateX(-50%);margin-bottom:20px;margin-top:5%">Other
                  Team Members &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!--row-->
          </div>
          <!--Container-->
          <br>
          <br>
        </div>

        <h1 style=" font-weight:300;font-family:Poppins;font-size:2.3em;text-align:center;"><b>Quick Link </b></h1><br>

        <div class="container-quick">
          <div class="row-quick" style=" font-weight:300; font-family:roboto;">
            <div class="wow fadeInLeft col-sm-4" data-wow-delay="0.5s" id="front" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
              <div class="fg" align="center" style="padding:10px">
                <a href="resume.html">
                  <ul style="list-style: none; padding: 0;">
                    <li><img class="img circle" src="images/resume.png"></li>
                    <li>
                      <h2 style=" font-weight:300;font-family:poppins;color:black;">How to build your resume</h2>
                    </li>
                  </ul>
                </a>
              </div>
            </div>

            <div class="wow fadeIn col-sm-4" data-wow-delay="0.5s" id="front" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
              <div class="fg" align="center" style="padding:10px">
                <a href="https://www.iul.ac.in/ccgnd/PDF/Annual_Report_2021_22.pdf" target="_blank" id="front">
                  <ul style="list-style: none; padding: 0;">
                    <li><img class="img circle" src="images/news.png"></li>
                    <li>
                      <h2 style=" font-weight:300;font-family:poppins; color:black;">Newsletter</h2>
                    </li>
                  </ul>
                </a>
              </div>
            </div>

            <div class="wow fadeInRight col-sm-4" data-wow-delay="0.5s" id="front" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
              <div class="fg" align="center" style="padding:10px">
                <a href="alumini.html" id="front">
                  <ul style="list-style: none; padding: 0;">
                    <li><img class="img circle" src="images/alumni.png"></li>
                    <li>
                      <h2 style=" font-weight:300;font-family:poppins; color:black;">Alumni</h2>
                    </li>
                  </ul>
                </a>
              </div>
            </div>
          </div>
        </div>

        <h1 style=" font-weight:300;font-family:Poppins;font-size:2.3em;text-align:center;"><b>Our Growth </b></h1><br>
        <div class="counter-container">
          <div class="counter-item">
            <i class="fas fa-building icon"></i>
            <span class="counter class1" data-target="225">0</span>
            <div class="counter-text">+COMPANIES</div>
          </div>
          <div class="counter-item">
            <i class="fas fa-briefcase icon"></i>
            <span class="counter class2" data-target="1200">0</span>
            <div class="counter-text">+OFFERS</div>
          </div>
          <div class="counter-item">
            <i class="fas fa-graduation-cap icon"></i>
            <span class="counter class3" data-target="41000">0</span>
            <div class="counter-text">+ALUMNI</div>
          </div>
        </div>
        </main>

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
              <a href="index.html"> Home</a> |
              <a href="about.html"> About</a> |
              <a href="#"> Placement</a> |
              <a href="contactus.html"> Contact</a> |
            </p>
            <p class="name"> Integral University Placement Cell &copy; 2024</p>
            </p>
            <br>
            <span class="dev"> Developed By <b>
                <a href="team.php">Project Team </a></b>
          </div>
        </footer>
        <!--Slide Show Code-->
        <script>
          var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
          };

          TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
              this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
              this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
              delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
              delta = this.period;
              this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
              this.isDeleting = false;
              this.loopNum++;
              delta = 500;
            }

            setTimeout(function() {
              that.tick();
            }, delta);
          };

          window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
              var toRotate = elements[i].getAttribute('data-type');
              var period = elements[i].getAttribute('data-period');
              if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
              }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
          };

          //Counter script
          const counterElements = document.querySelectorAll('.counter');
          const counterItems = document.querySelectorAll('.counter-item');

          function isElementInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
              rect.top >= 0 &&
              rect.left >= 0 &&
              rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
              rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
          }

          function animateCounters() {
            counterItems.forEach((counterItem, index) => {
              if (isElementInViewport(counterItem)) {
                counterItem.classList.add('visible');

                const targetValue = parseInt(counterElements[index].dataset.target);
                let currentValue = 0;
                const increment = targetValue / 100;

                function animateCounter() {
                  currentValue += increment;
                  counterElements[index].textContent = Math.floor(currentValue);

                  if (currentValue < targetValue) {
                    requestAnimationFrame(animateCounter);
                  }
                }

                animateCounter();
              }
            });
          }

          window.addEventListener('scroll', animateCounters);

          //back to top script
          let mybutton = document.getElementById("myBtn");

          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function() {
            scrollFunction()
          };

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              mybutton.style.display = "block";
            } else {
              mybutton.style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
  </body>

</html>