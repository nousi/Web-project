<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Request Details</title>
    <!-- Include necessary CSS stylesheets -->
    <link rel="stylesheet" href="../CSS_Files/viewJobRequestListStyle.css">
    <link rel="stylesheet" href="../CSS_Files/jobRequestStyle.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .info-label {
            font-weight: bold;
            color: #333;
        }

        .info-value {
            color: #666;
        }

        .offer-form {
            margin-top: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Include the header/navigation -->
<?php include("bbystrheader.php"); ?>

<!-- Page Content -->
<div class="container">

    <h2>Learning Request Details</h2>

    <?php
    // Include database connection script
    include('../PHP_Files/connect_db.php');

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connection, $_GET['id']);

        // Query to fetch learning request details
        $sql = "SELECT `learnerName`, `languageGoals`, `proficiency`, `preferredSchedule`, `sessionDuration`, `status` 
                FROM `learning_requests` 
                WHERE `learning_requests`.`ID` = $id";

        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Display learning request details
            echo '<div>';
            echo '<p><span class="info-label">Learner Name:</span> <span class="info-value">' . $row['learnerName'] . '</span></p>';
            echo '<p><span class="info-label">Language Goals:</span> <span class="info-value">' . $row['languageGoals'] . '</span></p>';
            echo '<p><span class="info-label">Proficiency:</span> <span class="info-value">' . $row['proficiency'] . '</span></p>';
            echo '<p><span class="info-label">Preferred Schedule:</span> <span class="info-value">' . $row['preferredSchedule'] . '</span></p>';
            echo '<p><span class="info-label">Session Duration:</span> <span class="info-value">' . $row['sessionDuration'] . '</span></p>';
            echo '<p><span class="info-label">Status:</span> <span class="info-value">' . $row['status'] . '</span></p>';
            echo '</div>';

            // Offer form for partner to respond
            echo '<form action="../PHP_Files/respondToLearningRequest.php" method="POST" class="offer-form">';
            echo '<label class="form-label">Your Offer (in SAR/hr):</label>';
            echo '<input type="number" name="offerPrice" class="form-input" min="0" max="99999" required>';
            echo '<input type="hidden" name="requestId" value="' . $id . '">';
            echo '<button type="submit" class="form-submit">Send Offer</button>';
            echo '</form>';
        } else {
            echo "<p>No learning request found with ID: $id</p>";
        }
    }
    ?>

</div>

<!-- Include the footer -->
<footer>
    <div>
        <a href="aboutUs.html">About Us</a> |
        <a href="FAQ.html">FAQs</a> |
        <a href="ContactUs.php">Contact Us</a>
    </div>
    <div id="shareWeb">
        <h4>Share the website</h4>
        <!-- Add social media icons and links here -->
    </div>
    <div class="footer">&copy; Your Company Name, <?php echo date('Y'); ?></div>
</footer>

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
