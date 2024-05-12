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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drives</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wdth@0,62.5..100;1,62.5..100&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
    ::after,
    ::before {
        box-sizing: border-box;
    }

    user agent stylesheet div {
        display: block;
        unicode-bidi: isolate;
    }

    body {
        font-family: 'poppins';

    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-bottom: .5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }

    style attribute {
        font-weight: 300;
        font-size: 3.3em;
        font-family: 'Poppins';
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }


    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    button,
    input {
        overflow: visible;
    }

    [type=reset],
    [type=submit],
    button,
    html [type=button] {
        -webkit-appearance: button;
    }

    button,
    select {
        text-transform: none;
    }

    .fa,
    .fas {
        font-weight: 900;
    }

    .fa,
    .far,
    .fas {
        font-family: Font Awesome\ 5 Free;
    }

    .fa-sm {
        font-size: .875em;
    }

    .fa,
    .fab,
    .fal,
    .far,
    .fas {
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1;
    }

    @media (min-width: 1200px) {
        .container-drive {
            max-width: 1140px;
        }
    }

    @media (min-width: 992px) {
        .container-drive {
            max-width: 960px;
        }
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .d-inline-block {
        display: inline-block !important;
    }

    .fa-graduation-cap:before {
        content: "\f19d";
    }

    .pageini a {
        padding: 5px 10px;
        margin: 1px;
        border: 1px solid;
        border-radius: 3px;
        background: #000000;
        color: white;
    }

    .drives {

        width: 70%;
        float: left;
        margin-left: 2%;
    }

    .drives-info {

        width: 98%;
        border-radius: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 3%;
        background-color: rgb(255, 255, 255);
        box-shadow: .5px .5px 10px grey;
    }


    .result-card {

        box-shadow: 2px 2px 15px grey;
        margin-top: 105px;
        padding: 10px;
        float: right;
        vertical-align: top;
        margin-bottom: 20px;
        margin-left: 1%;
        margin-right: 1%;
    }

    .result-card p {
        font-size: 10px;
        font-weight: 400;
    }

    .drive-title {

        font-size: 30px;
        font-family: 'poppins';
    }

    .drive-head {

        background-color: #f8f9fa;
        border-radius: 20px;
        margin: 0px 0px 0px 0px;
        font-family: 'poppins';
        display: block;
    }


    button,
    input {
        overflow: visible;
    }

    .text-capitalize {
        text-transform: capitalize !important;
    }

    .mr-3,
    .mx-3 {
        margin-right: 1rem !important;
    }

    .d-inline {
        display: inline !important;
    }

    .align-middle {
        vertical-align: middle !important;
    }

    .card-title {
        margin-bottom: .75rem;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .h6,
    h6 {
        font-size: 1rem;
    }

    .text-muted {
        color: #d85151 !important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
        box-sizing: content-box;
        height: 0;
        overflow: visible;
    }

    .badge {
        width: 60px;
        font-size: 14px;
        padding: 4px;
        position: absolute;
        right: 25px;
        top: 10px;
        text-align: center;
        border-radius: 25px;
        transform: rotate(0deg);
        background-color: #ff0000;
        color: white;
        animation: blinker 1s linear infinite;
    }

    b {
        color: crimson;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
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

    <div class="container-fluid" style="padding: top 50px; color: #464646;">
        <div class="row-drive">
            <div class="container-drive">
                <div class="page-header">
                    <div class="wow flipInX" style="visibility: visible; animation-name: flipInX;">
                        <h1 style="font-weight:300;font-size:3.3em;font-family: Poppins; text-align: center;">
                            <span class="glyphicon glyphicon-education"></span>
                            Placement Events
                        </h1>
                    </div>
                </div>
                <br>
                <br>

                <br>
                <br>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">

                        <div class="pageini" style="text-align: center;">
                            <ul style="list-style: none; margin: 0;">
                                <li>
                                    <a href="registration.php?page=1">1</a> <a href="registration.php?page=2">2</a>
                            </ul>
                        </div>


                        <br>
                        <!--Drive information to be updated here-->

                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <h5 class="card-title d-inline drive-title align-middle mr-3 text-capitalize">YHills Edutech
                                <h5>
                                    <span class="badge">New</span>
                                </h5>

                                <div>
                                    <h6 style="display: inline-block;">Drive Date:</h6>
                                    <h6 class="text-muted " style="display: inline-block;">
                                        To be Announced</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>About the Company:</strong> At YHills Edutech, we're seeking a qualified
                                        business development specialist to extend our reach through expert discovery and
                                        exploration of new and untapped business opportunities and relationships. Highly
                                        skilled at sales and business operations, this person will join and inspire a
                                        team
                                        of like-minded go-getters to achieve our company vision.</p>

                                    <hr>
                                    <p><strong>Profile Offered:</strong> Process Associate</p>

                                    <hr>
                                    <p><strong>Package:</strong> CTC during training period: Rs. 4.20 LPA (INR 2.20 LPA
                                        as a
                                        fixed pay and INR 2.0 LPA as incentive pay)<br>The CTC after successful
                                        completion of the probation period of three months is Rs.
                                        7.25 LPA (INR 3.25 to INR 4.25 LPA as fixed pay plus INR 3.0 LPA as incentive
                                        pay)
                                        based on the performance.</p>

                                    <hr>
                                    <p><strong>Roles and Responsibilties:</strong><br>
                                        • Handling Outbound calls, understanding customer needs and identifying sales
                                        opportunities.<br>
                                        • Managing both our existing sales pipeline and developing new business
                                        opportunities.<br>
                                        • Take a lead role in the development of proposals and presentations for new
                                        business
                                        materials to create and nurture business opportunities and partnerships.<br>
                                        • Identify trends and customer needs, building a short/medium/long-term sales
                                        pipeline in
                                        accordance with targets.<br>
                                        • Develop strategies and positions by analyzing new venture integration.<br>
                                    </p>

                                    <hr>
                                    <p><strong>Job Type </strong> Work from Office </p>

                                    <hr>
                                    <p><strong>Location:</strong> Noida</p>

                                    <hr>
                                    <p><strong>Probation Period:</strong> 3 Months

                                        Training period : 10 Days ( Unpaid)</p>

                                    <hr>
                                    <p><strong>Eligibility:</strong> BBA / B.Sc / B.Com / BA / BCA / MBA</p>

                                    <hr>
                                    <p><strong>Skills Required:</strong><br>
                                        • Bachelor’s degree in engineering or management. <br>
                                        • Excellent verbal and written communication skills. <br>
                                        • Time Management skills. <br>
                                        • Proven ability to plan and manage resources. <br>
                                        • Ability to deliver presentations. <br>
                                        • Interpersonal skills and ability to build rapport with clients. <br>
                                        • Good listening and problem-solving skills. </p>

                                    <hr>
                                    <p><strong>Selection Procedure:</strong><br>
                                        Virtual Interview</p>

                                    <hr>
                                    <p><strong>NOTE:</strong> Job description pdf is attached kindly read it.</p>

                                    <!--hr>
                                    <p><em>Students registering and not turning up for the drives will be
                                            <strong>BLACKLISTED</strong> from <strong>ALL</strong> further drives.</em>
                                    </p-->

                                    <hr>
                                    <p><strong>Last Date to Apply:</strong> 25th April, 2024</p>

                                    <hr>
                                    <p><strong>For Queries, Contact:</strong><br>
                                        Mr. Amir Khan :&nbsp;9795770027<br></p>

                                    <hr>
                                    <p><strong> Registration Link:</strong> <a href="https://forms.gle/un3V2FwvAhPiggAc7"><b>https://forms.gle/un3V2FwvAhPiggAc7 </b></a>
                                    </p>
                                    <hr>
                                    <p><strong>Open JD: </strong> <a href="https://drive.google.com/file/d/1J7ZkZl9Lav6XE3GZorInVxhbzHwnxqCK/view?usp=drive_link">
                                            Click here</a></p>

                                </div>
                        </div>


                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <p class="card-title d-inline drive-title align-middle mr-3 text-capitalize">Corizo,
                                Bangalore</p>

                            <div>
                                <h6 style="display: inline-block;">Drive Date:</h6>
                                <h6 class="text-muted " style="display: inline-block;">
                                    To be Announced </h6>
                            </div>
                            <div class="card-body">
                                <p><strong>About the Company:</strong> Corizo is an edtech platform that helps students
                                    with internships, professional training programs, career guidance, and mentorship.
                                    Our aim is to bridge the gap between formal education and the ever changing
                                    requirements of the industry.</p>

                                <hr>
                                <p><strong>Profiles Offered:&nbsp;</strong><br>
                                    Business Development Associate (BDA)</p>

                                <hr>
                                <p><strong>Package:&nbsp;</strong><br>
                                    Rs. 4.00 LPA fixed + Rs. 2.5 LPA variable </p>

                                <hr>
                                <p><strong> Stipend During Training:&nbsp;</strong><br>
                                    Rs. 15,000/- + 10,000/-(variable incentives)</p>

                                <hr>
                                <p><strong>Job type:</strong> Work from office </p>

                                <hr>
                                <p><strong>Job Location:</strong> Banglore </p>

                                <hr>
                                <p><strong>Roles and Responsibilities:</strong><br>

                                    • Identify and develop strategic relationships with potential customers. <br>

                                    • Develop a strong pipeline of new customers through direct or indirect customer
                                    contact and prospecting.<br>

                                    • Ongoing monitoring and analysis of pipeline to review performance & optimise

                                    accordingly to ensure objectives are met.<br>

                                    • Maintaining strong follow-ups and regular feedback calls.<br>

                                    • Creating lead engagement plans and strategy.<br>

                                    • Studying the details of each offering and remaining abreast of updates to these
                                    offerings.<br>

                                    • Efficient and effective lead utilisation with consistent follow-ups, low
                                    Turn-Around-Time (TAT) and increased connectivity with multiple attempts.<br>

                                    • Update and create tailored client proposals and negotiate further to close the deals
                                    Building cross-discipline relationships in the organisation, partnering closely with the growth and marketing team, providing feedback and insights </p>

                                <hr>
                                <p><strong>Joining:</strong> June 2024</p>

                                <hr>
                                <p><strong>Eligibility:</strong> Final year students ( Batch of 2024) from all courses
                                    can apply. &nbsp;</p>

                                <hr>
                                <p><strong>Skills Required:</strong><br>
                                    • Excellent communication and interpersonal skills.<br>
                                    • Eager to learn and adapt to a changing environment.<br>
                                    • Basic in Microsoft Excel.<br>
                                    • Proficient in social media platforms and basic graphic design tools.<br>
                                    • Excellent typing skills and data entry proficiency.</p>

                                <hr>
                                <p><strong>Selection Procedure:</strong> Interview Round(s)</p>

                                <hr>
                                <p><em>Students registering and not turning up for the drive will be
                                        <strong>BLACKLISTED</strong> from <strong>ALL</strong> further drives.</em></p>

                                <hr>
                                <p><strong>Last Date to Apply:</strong> 18th April 2024 (Thursday), latest by 02 : 00 PM</p>

                                <hr>
                                <p><strong>For Queries, Contact:</strong><br>
                                    Mohammad Shahnawaz (CCG&D):&nbsp;9918246056<br>
                                    &nbsp;</p>

                            </div>
                        </div>


                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <p class="card-title d-inline drive-title align-middle mr-3 text-capitalize">VIROHAN</p>

                            <div>
                                <h6 style="display: inline-block;">Drive Date:</h6>
                                <h6 class="text-muted " style="display: inline-block;">
                                    Not Known </h6>
                            </div>
                            <div class="card-body">
                                <p><strong>About the Company:</strong> Virohan is a healthcare-focused Ed-Tech company
                                    dedicated to training young talents for careers in the healthcare sector. Their
                                    vision is to create India’s most extensive industry-demand-led ed-tech platform for
                                    healthcare professionals.</p>

                                <hr>
                                <p><strong>Profile Offered:</strong> Video Designer&nbsp;</p>

                                <hr>
                                <p><strong>Package:</strong> CTC INR 5 to INR 6 LPA</p>

                                <hr>
                                <p><strong>Roles and Responsibilities:&nbsp;</strong><br>
                                    • Display exceptional video editing skills, seamlessly weaving together visuals and
                                    narratives to create impactful content.<br>
                                    • Devise strategic templates for video content across Instagram and YouTube,
                                    ensuring a cohesive and<br>
                                    impactful brand presence.<br>
                                    • Collaborate closely with the content creator &amp; content writer to ensure
                                    alignment between script and visual elements.</p>

                                <hr>
                                <p><strong>Job type: </strong>Work from Office&nbsp;</p>

                                <hr>
                                <p><strong>Location:</strong> Gurugram</p>

                                <hr>
                                <p><strong>Joining:</strong> June 2024</p>

                                <hr>
                                <p><strong>Eligibility:</strong> Final year students (Batch of 2024) from all the
                                    courses can apply.</p>

                                <hr>
                                <p><strong>Skills Required:&nbsp;</strong><br>
                                    • Efficient in motion graphic design, showcasing mastery in intelligent video
                                    design, color grading, and&nbsp;<br>
                                    cinematography.<br>
                                    • Bring a distinctive artistic flair to each project, setting our content apart in
                                    the competitive digital landscape.<br>
                                    • Analyze and adapt to evolving audience preferences and behaviors.</p>

                                <hr>
                                <p><strong>Selection Procedure:&nbsp;</strong><br>
                                    • Assignment Submission&nbsp;<br>
                                    • HR &amp; GD Round<br>
                                    • Final Ops Round</p>

                                <hr>
                                <p><em>Students registering and not turning up for the drive shall be
                                        <strong>BLACKLISTED</strong> from <strong>ALL</strong> the further drives
                                        &nbsp;</em></p>

                                <hr>
                                <p><strong>Last Date To Apply: </strong>11:59 PM, 26th March 2024</p>

                                <hr>
                                <p><strong>For Queries, Contact:&nbsp;</strong><br>
                                    Nancy:&nbsp;6261797526</p>

                            </div>
                        </div>


                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <p class="card-title d-inline drive-title align-middle mr-3 text-capitalize">LENSKART </p>

                            <div>
                                <h6 style="display: inline-block;">Drive Date:</h6>
                                <h6 class="text-muted " style="display: inline-block;">
                                    Not Known </h6>
                            </div>
                            <div class="card-body">
                                <p><strong>About the company: </strong>Lenskart is an Indian multinational optical
                                    prescription eyewear retail chain, based in Gurgaon. As of March 2023, Lenskart has
                                    more than 2,000 retail stores. Its manufacturing facility in New Delhi manufactures
                                    3 lakh glasses a month.</p>

                                <hr>
                                <p><strong>Profile Offered: </strong>Fashion Consultant</p>

                                <hr>
                                <p><strong>Package:</strong> CTC INR 3 LPA</p>

                                <hr>
                                <p><strong>Job Type:</strong> Work from Office</p>

                                <hr>
                                <p><strong>Roles and Responsibilities:&nbsp;</strong><br>
                                    • Calling existing and potential customers to persuade them to purchase company
                                    products and services.<br>
                                    • Accurately recording details of customers’ purchase orders.<br>
                                    • Contact potential or existing customers to inform them about a product or service
                                    using scripts.<br>
                                    • Take and process orders in an accurate manner.<br>
                                    • Managing customer accounts by ensuring that existing customers remain satisfied
                                    with company products and services.<br>
                                    • Developing and sustaining solid relationships with customers to encourage repeat
                                    business.</p>

                                <hr>
                                <p><strong>Joining:</strong> June 2024</p>

                                <hr>
                                <p><strong>Eligibility:</strong> Final year students (Batch of 2024) from all the
                                    courses can apply.</p>

                                <hr>
                                <p><strong>Skills Required:&nbsp;</strong><br>
                                    • Strong Communication &amp; Interpersonal skills.<br>
                                    • Problem solving and Negotiation skills.&nbsp;<br>
                                    • Keep records of calls and sales and note useful information.<br>
                                    • Proficiency in english.</p>

                                <hr>
                                <p><strong>Location:</strong> Gurugram&nbsp;</p>

                                <hr>
                                <p><strong>Selection Procedure:</strong><br>
                                    • Interview Round(s)</p>

                                <hr>
                                <p><em>Students registering and not turning up for the drive will be
                                        <strong>BLACKLISTED</strong> from <strong>ALL</strong> further drives.</em></p>

                                <hr>
                                <p><strong>Last Date to Apply: </strong>11:59 PM , 27th March 2024</p>

                                <hr>
                                <p><strong>For Queries, Contact:</strong><br>
                                    Mimansa:&nbsp;&nbsp;9557026662</p>

                            </div>
                        </div>


                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <p class="card-title d-inline drive-title align-middle mr-3 text-capitalize">FUTURES FIRST
                            </p>

                            <div>
                                <h6 style="display: inline-block;">Drive Date:</h6>
                                <h6 class="text-muted " style="display: inline-block;">
                                    Not Known </h6>
                            </div>
                            <div class="card-body">
                                <p><strong>About the Company: </strong>Futures First is part of the Hertshten Group,
                                    it's holding company, which has a fast-growing business that continues to raise the
                                    international benchmarks for excellence across the finance industry.&nbsp;&nbsp;</p>

                                <hr>
                                <p><strong>Profiles Offered: </strong>Business Operations Analyst</p>

                                <hr>
                                <p><strong>Package: </strong>CTC INR 9.9 LPA&nbsp;&nbsp;</p>

                                <hr>
                                <p><strong>Job Type: </strong>Work From Office</p>

                                <hr>
                                <p><strong>Location: </strong>Gurugram&nbsp;</p>

                                <hr>
                                <p><strong>Joining: </strong>June 2024</p>

                                <hr>
                                <p><strong>Roles and Responsibilities:&nbsp;&nbsp;</strong></p>

                                <p>• Evaluate existing business processes to identify inefficiencies and propose
                                    improvements.</p>

                                <p>• Engage with different departments to gather information, understand operational</p>

                                <p>challenges, and provide analytical support.</p>

                                <p>• Evaluate and recommend technology solutions to enhance business operations.&nbsp;
                                </p>

                                <p>• Act as a liaison between relevant departments to ensure seamless processes.</p>

                                <p>• Collaborate with other team members to implement process enhancements and</p>

                                <p>streamline workflows.</p>

                                <hr>
                                <p><strong>Eligibility: </strong>Final year students (Batch of 2024) from all courses
                                    can apply&nbsp;&nbsp;</p>

                                <hr>
                                <p><strong>Skills Required:&nbsp;&nbsp;</strong></p>

                                <p>• Strong analytical and quantitative skills.&nbsp;&nbsp;</p>

                                <p>• Familiarity with financial markets and products.</p>

                                <p>• Proficient in programming languages such as Python/R</p>

                                <p>• Proficient in Excel and VBA&nbsp;</p>

                                <p>• Strong attention to detail and ability to work in a fast-paced environment</p>

                                <p>• Strong verbal and written communication skills</p>

                                <p>• Ability to adapt to changing priorities and thrive in a dynamic work environment.
                                </p>

                                <hr>
                                <p><strong>NOTE:&nbsp;</strong></p>

                                <p><strong>• </strong>6.0+ CGPA required</p>

                                <p>• Bachelor’s degree in Business, Finance or Engineering</p>

                                <hr>
                                <p><strong>Selection procedure:&nbsp;</strong></p>

                                <p><strong>• </strong>Interview Round(s)&nbsp;</p>

                                <hr>
                                <p><strong>&nbsp;</strong><em>Students registering and not turning up for the drive will
                                        be<strong> BLACKLISTED </strong>from <strong>ALL </strong>further
                                        drives<strong>.&nbsp;&nbsp;</strong></em></p>

                                <hr>
                                <p><strong>Last date to Apply: </strong>11:59 PM, 17th March 2024&nbsp;</p>

                                <hr>
                                <p><strong>For Queries, Contact:</strong></p>

                                <p>Nishank: 7206089834</p>

                                <p>&nbsp;</p>

                            </div>
                        </div>


                        <div class="drives-info  card d-inline-block">

                            <i class="fas fa-graduation-cap" style="font-size: 20px;"></i>
                            <p class="card-title d-inline drive-title align-middle mr-3 text-capitalize">CHEGG </p>

                            <div>
                                <h6 style="display: inline-block;">Drive Date:</h6>
                                <h6 class="text-muted " style="display: inline-block;">
                                    Not Known </h6>
                            </div>
                            <div class="card-body">
                                <p><strong>About the Company: </strong>Chegg Inc. aims to empower students by giving
                                    them full support in Learning, Earning and Growing at every stage. Their Student Hub
                                    makes higher education more affordable and more accessible, all while improving
                                    student outcomes.&nbsp;</p>

                                <hr>
                                <p><strong>Profile Offered: </strong>Managed Network Expert (Subject Expert)</p>

                                <hr>
                                <p><strong>Package:</strong> INR 30,000 to INR 80,000 per month</p>

                                <hr>
                                <p><strong>Roles and Responsibilities:</strong> A Chegg expert gives solutions to
                                    subject-related questions online posted on our Chegg Q&amp;A platform. Experts earn
                                    for every question answered. Refer the JD for more details about the role,
                                    eligibility, and compensation.&nbsp;</p>

                                <hr>
                                <p><strong>Job type: </strong>Work from Home</p>

                                <hr>
                                <p><strong>Joining:</strong> June, 2024</p>

                                <hr>
                                <p><strong>Location:</strong> Work from Home&nbsp;</p>

                                <hr>
                                <p><strong>Eligibility: </strong>Final year students (Batch of 2024) from all the
                                    following courses can apply:<br>
                                    • Bcom (P)&nbsp;<br>
                                    • Bcom (H)<br>
                                    • B.sc (computer science)&nbsp;<br>
                                    • B.sc (mathematics)</p>

                                <hr>
                                <p><strong>Skills Required:</strong><br>
                                    • Ensure that outlined quality parameters are followed.<br>
                                    • Ensure that authoring guidelines are adhered<br>
                                    • To ensure high-level of academic</p>

                                <hr>
                                <p><strong>Selection Procedure:&nbsp;</strong><br>
                                    • Subject Test&nbsp;<br>
                                    • Guidelines Test</p>

                                <hr>
                                <p><em>Students registering and not turning up for the drive will be
                                        <strong>BLACKLISTED</strong> from <strong>ALL</strong> further drives.</em></p>

                                <hr>
                                <p><strong>Last Date To Apply: </strong>11:59 PM, 28th February 2024</p>

                                <hr>
                                <p><strong>For Queries, Contact:</strong><br>
                                    Vaibhav: 9888579957</p>

                            </div>
                        </div>


                    </div>
                </div><!-- animate In -->
            </div>
        </div>
    </div>
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