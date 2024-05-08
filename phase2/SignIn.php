<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="topofpage">
    <img src="logo.PNG" alt="Fluingo Website Logo" class="logo">
</div>

<div class="cont">
    <h2 class="signTitle">Sign in</h2>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

  
    $servername = "localhost";
    $username = "root"; 
    $dbpassword = ""; 
    $dbname = "flungo"; 


    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Compare plain text passwords directly
            if ($password === $row['password']) {
                // Password is correct, redirect or start session
                echo '<p>Login successful!</p>';
                // Redirect to another page or set session variables here
            } else {
                echo '<p>Invalid username or password.</p>';
            }
        } else {
            echo '<p>No user found with that email address.</p>';
        }
        $stmt->close();
    } else {
        echo '<p>Database query failed: ' . $conn->error . '</p>';
    }
    $conn->close();
}
?>

    <div class="content-container">
        <div class="contentedit">
            <form method="post">
                <label for="email">Email: <span class="asterisk">*</span></label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password: <span class="asterisk">*</span></label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <div class="clearfix">
                    <button type="submit" class="loginbtn">Log In</button>
                    <button type="button" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="signin-link">
    Don't have an account? <a href="SignUpLearnr.html">Sign up</a>
</div>

<div class="footer-links">
    <a href="PrivacyPolicy.html">Privacy Policy</a>
    <a href="TermsAndConditions.html">Terms & Conditions</a>
    <a href="ContactUs.html">Contact Us</a>
</div>
</body>
</html>
