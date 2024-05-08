<?php
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','flungo');

    if (!$con = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");
   

    if(!mysqli_select_db($con, DB_NAME))
        die("Could not open the ".DB_NAME." database.");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
     <!-- Navbar Start -->
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
                    <a href="LprofileView.php" class="dropdown-item">view your profile</a> 
                    <a href="LprofileEdit.php" class="dropdown-item">Edit your profile</a>                        
                    <a href="index1.html" class="dropdown-item">Sign out</a>   
                    </div>

                </div>
                
                
                
            </div>
            
           
        </div>
    </nav>
    <!-- Navbar End  -->
    <!-- Navbar End -->
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Profile managing (Language Learner)
        </h4>
        <?php
        if(isset($_GET['email'])){
            $user_email = $_GET['email'];
            $users = "SELECT * FROM users WHERE email='$user_email'";
            $users_run= mysqli_query($con,$users);

            if(mysqli_num_rows($users_run)>0){
                foreach($users_run as $user ){
                    
                
                ?>
        <form method="post" action="Lcode.php">
                <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                            
                        

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="user icon.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    
                                    <label class="btn btn-outline-primary">
                                        Upload new photo 
                                        <input type="file" class="account-settings-fileinput">
                                    </label> <br>
                                  
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" >First Name</label>
                                    <input name="fname" type="text" value="<?= $user['FirstName']; ?>  " class="form-control mb-1"  required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" value="<?= $user['LastName']; ?>" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label> 
                                    <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control mb-1" >
                                    
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                
                                <div class="form-group">
                                <label class="form-label">City</label>
                                        <select name="city"   class="custom-select">
                                            <option value="">Select city</option>
                                        <option value="jeddah" <?= $user['city'] == 'jeddah'?'selected':'' ?>>jeddah</option>
                                            <option value="riyadh" <?= $user['city'] == 'riyadh'?'selected':'' ?> >riyadh</option>
                                            <option value="abha" <?= $user['city'] == 'abha'?'selected':'' ?>>abha</option>
                                            <option vvalue="alQaseem" <?= $user['city'] == 'alQaseem'?'selected':'' ?>>alQaseem</option>
                                            <option value="Mekkah" <?= $user['city'] == 'Mekkah'?'selected':'' ?>>Mekkah</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input name="location" value="<?= $user['location']; ?>" type="text" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" name="save" class="btn btn-primary">Save</button>&nbsp;
            <button type="button" name="cancel" class="btn btn-default">Cancel</button>
        </div>
    </div>
                </form>
        
    <?php
            }
        }
            else
            {
                ?>
                <h4>no record found</h4>
                <?php
            }
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
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>FLUNGO@example.com</p>
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
                        &copy; <a class="border-bottom" href="#">FLUNGO</a>, All Right Reserved.

                        
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
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>