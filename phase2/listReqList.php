<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Partner List</title>
    
    <link rel="stylesheet" href="../CSS_Files/viewOfferListStyle.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/footer.css">
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
   
    <?php include("bbystrheader.php"); ?>

    <h2>Language Partner List</h2>

    <div class="partner-list">
        <?php
        session_start();
        // Database connection details
        $hostname = "your_hostname";
        $username = "your_username";
        $password = "your_password";
        $database = "your_database_name";

        // Establish a database connection
        $connection = mysqli_connect($hostname, $username, $password, $database);

        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch language partners
        $query = "SELECT * FROM `language_partners`";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $language = $row['language'];
                $proficiency = $row['proficiency'];
                $rating = $row['rating'];
                $session_price = $row['session_price'];
                ?>

                <div class="partner-card">
                    <img src="path_to_partner_image.jpg" alt="<?php echo $name; ?>">
                    <h2><?php echo $name; ?></h2>
                    <p><?php echo $language; ?> Tutor</p>
                    <p>Proficiency: <?php echo $proficiency; ?></p>
                    <p>Rating: <span class="rating"><?php echo $rating; ?></span></p>
                    <p>Session Price: $<?php echo $session_price; ?>/hour</p>
                    <!-- Add a link to view partner details -->
                    <a href="view_partner_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                </div>

                <?php
            }
        } else {
            echo "<p>No language partners found.</p>";
        }

        
        mysqli_close($connection);
        ?>
    </div>

    
    <footer>
        
        <table class="tableF">
            <tr>
                <th><a href="aboutUs.html">About Us</a></th>
                <th><a href="FAQ.html">FAQs</a></th>
                <th><a href="ContactUs.php">Contact Us</a></th>
            </tr>
        </table>
       
        <div id="shareProfile">
            <h4>Share the website</h4>
            <!-- Add social media icons with links -->
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter fa-2x"></i></a>
            
        </div>
        <div class="footer">&copy; A Watchful Eye, 2022</div>
    </footer>

    <!-- Include necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="lib/wow/wow.min.js"></script>
 <script src="lib/easing/easing.min.js"></script>
 <script src="lib/waypoints/waypoints.min.js"></script>
 <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Add any additional scripts if needed -->
    <script src="js/main.js"></script>

</body>
</html>
