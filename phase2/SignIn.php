<?php
session_start();
// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header("Location: homePage.php");
    exit;
}

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "flungo";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) { //  password comparison
                $_SESSION['user'] = $email;
                header("Location: homePage.php");
                exit;
            } else {
                $errorMessage = 'Invalid username or password.';
            }
        } else {
            $errorMessage = 'No user found with that email address.';
        }
        $stmt->close();
    } else {
        $errorMessage = 'Database query failed: ' . $conn->error;
    }
    $conn->close();
}
?>

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
    <?php if ($errorMessage): ?>
        <div style="color: red; text-align: center; margin-bottom: 20px;">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>
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

