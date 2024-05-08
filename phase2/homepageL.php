<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>homepageL</title>
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

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        .partner-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .partner-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .partner-card img {
            max-height: 200px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
        }

        .rating {
            color: #ffc107;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index1.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="img/0002.jpg" alt="" width="50" height="45">
            <h2 class="text1" style="color: #7BC4E7;">FLUINGO</h2>
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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img class="img-fluid" src="user icon.png" alt="" width="30" height="30"></a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="profileL.html" class="dropdown-item">Edit your profile</a>
                        <a href="index1.html" class="dropdown-item">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <br>
    <h3 style="color: #5a85ca;">Start learning any language for Exams or Schools with one of these top teachers.</h3>
    <p>There isn't a single way to teach a language. Book a regular lesson or a trial lesson to get an introduction to a teacher's style. We have teachers who specialize in teaching the foundations of English all the way to advanced topics.</p>
    <br>
    <h3 style="color: #5a85ca;">Find Teachers !</h3>

    <div class="partner-list">
        <?php
        // array of partners (replace with actual data from database)
        $partners = array(
            array(
                'image_url' => 'student1.png',
                'name' => 'John Doe',
                'subject' => 'English',
                'proficiency' => 'Advanced',
                'rating' => '4.4',
                'session_price' => '20'
            ),
            array(
                'image_url' => 'student2.jpg',
                'name' => 'Jane Smith',
                'subject' => 'Spanish',
                'proficiency' => 'Intermediate',
                'rating' => '4.8',
                'session_price' => '15'
            )
            // Add more partners as needed
        );

        // Loop through partners to generate dynamic content
        foreach ($partners as $partner) {
            echo '<div class="partner-card">';
            echo '<img src="' . $partner['image_url'] . '" alt="' . $partner['name'] . '">';
            echo '<h2>' . $partner['name'] . '</h2>';
            echo '<p>' . $partner['subject'] . ' Tutor</p>';
            echo '<p>Proficiency: ' . $partner['proficiency'] . '</p>';
            echo '<p>Rating: <span class="rating">' . $partner['rating'] . '</span></p>';
            echo '<p>Session Price: $' . $partner['session_price'] . '/hour</p>';
            echo '<a href="PostLearR.php" style="color: #fff;"><button>Book now</button></a>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <!-- Footer content goes here -->
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

</html>
