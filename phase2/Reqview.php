<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Requestview</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

   

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

   <!-- Navbar End -->
     
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index1.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="img/0002.jpg" alt="" width="50" height="45"><h2 class="text1" style="color: #7BC4E7;;">FLUINGO</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="Reqview.html" class="nav-item nav-link">requests</a>
               
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">SESSIONS</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="Current_session.html" class="dropdown-item">Current session</a>
                        <a href="Previous_session.html" class="dropdown-item">Previous session</a>
                       
                    </div>
                </div>
                <a href="partners lists.html" class="nav-item nav-link">Teachers</a>
                <div class="nav-item dropdown">
                    
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img class="img-fluid" src="user icon.png" alt="" width="30" height="30"></a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="profileL.html" class="dropdown-item">Edit your profile</a>
                        <a href="index1.html" class="dropdown-item">Sign out</a>   
                    </div>

                </div>
        
                
                
            </div>
            
           
        </div>
    </nav>
    <!-- Navbar End  -->
    <br>
    <br>
    <h2 style="color: #2c6783; text-align: center;"> My requests With Their Status</h2> 
   
<!-- PHP Script to Retrieve Requests -->
<?php
session_start();
// Include database connection file
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "flungo";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve requests related to the learner's email
// Assuming learner's email is stored in session variable

$learner_email = $_SESSION['learnerEmail'];

// Query to retrieve requests
$query = "SELECT * FROM requests WHERE learnerEmail = '$learner_email'";
$result = mysqli_query($connection, $query);

// Check if there are any requests
if (mysqli_num_rows($result) > 0) {
    ?>
    <!-- Table to display requests -->
    <table class="table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Language</th>
                <th>Proficiency Level</th>
                <th>Preferred Schedule</th>
                <th>Session Duration</th>
                <th>Status</th>
                <th>Edit/Cancel</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through retrieved requests and display them in rows
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['Rnumber']; ?></td>
                    <td><?php echo $row['languageToLearn']; ?></td>
                    <td><?php echo $row['proficiencyLevel']; ?></td>
                    <td><?php echo $row['preferredSchedule']; ?></td>
                    <td><?php echo $row['sessionDuration']; ?></td>
                    <td style="color: <?php echo ($row['requestStatus'] == 'Accepted') ? 'green' : (($row['requestStatus'] == 'Rejected') ? 'red' : 'gray'); ?>"><?php echo $row['requestStatus']; ?></td>
                    <td>
                        <?php
                        // Enable edit and cancel buttons for pending or rejected requests
                        if ($row['requestStatus'] == 'Pending' || $row['status'] == 'Rejected') {
                            echo "<button>Edit Request</button>";
                            echo "<button>Cancel Request</button>";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "<p>No requests found.</p>";
}
?>

   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>FLUINGO@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Enter your email to subscribe to the newsletter.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">FLUINGO</a>, All Right Reserved.

                    
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> 
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="lib/wow/wow.min.js"></script>
 <script src="lib/easing/easing.min.js"></script>
 <script src="lib/waypoints/waypoints.min.js"></script>
 <script src="lib/owlcarousel/owl.carousel.min.js"></script>

 <!-- Template Javascript -->
 <script src="js/main.js"></script>
</body>