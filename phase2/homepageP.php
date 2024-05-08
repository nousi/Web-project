<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>homepageP</title>
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

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    // Function to include spinner
    function includeSpinner()
    {
        echo '
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        ';
    }

    // Function to include navbar
    function includeNavbar()
    {
        echo '
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <!-- Navbar content -->
        </nav>
        ';
    }

    // Function to include footer
    function includeFooter()
    {
        echo '
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <!-- Footer content -->
        </div>
        ';
    }

    // Function to generate partner list
    function generatePartnerList()
    {
        // Example partner data (replace with dynamic data retrieval)
        $partners = [
            [
                'name' => 'John Doe',
                'language' => 'English',
                'proficiency' => 'Advanced',
                'country' => 'Japan'
            ],
            [
                'name' => 'Jane Smith',
                'language' => 'Spanish',
                'proficiency' => 'Intermediate',
                'country' => 'United States'
            ],
            // Add more partners as needed...
        ];

        echo '<br>';
        echo '<h3 style="color: #5a85ca;">Find Students!</h3>';
        echo '<div class="partner-list">';

        foreach ($partners as $partner) {
            echo '
            <div class="partner-card">
                <img src="user icon.png" alt="' . $partner['name'] . '">
                <h2>' . $partner['name'] . '</h2>
                <p>wanted language: ' . $partner['language'] . '</p>
                <p>Proficiency: ' . $partner['proficiency'] . '</p>
                <p>' . $partner['country'] . '</p>
                <a target="_blank" href="chat.php?partner=' . urlencode($partner['name']) . '" style="color: #fff;"><button>Send message</button></a>
            </div>
            ';
        }

        echo '</div>';
    }
    ?>

    <!-- Include Spinner -->
    <?php includeSpinner(); ?>

    <!-- Include Navbar -->
    <?php includeNavbar(); ?>

    <!-- Generate Partner List -->
    <?php generatePartnerList(); ?>

    <!-- Include Footer -->
    <?php includeFooter(); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
</body>

</html>
