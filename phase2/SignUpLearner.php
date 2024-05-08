<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flungo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $terms = isset($_POST['terms']); // Check if terms checkbox is checked

    if ($terms) {
        if ($password === $confirm_password) {
            // Check if email already exists
            $checkEmail = "SELECT email FROM users WHERE email='$email'";
            $result = $conn->query($checkEmail);
            if ($result->num_rows > 0) {
                $message = "Email already in use. Please use a different email.";
            } else {
                // Insert into users table
                $sqlUser = "INSERT INTO users (email, password, FirstName, LastName) VALUES ('$email', '$password', '$firstname', '$lastname')";
                if ($conn->query($sqlUser) === TRUE) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userid'] = $email; // email as user id
                    $_SESSION['username'] = $firstname;
                    header("Location: LearnerPage.php");
                    exit;
                } else {
                    $message = 'Error registering user: ' . $conn->error;
                }
            }
        } else {
            $message = 'Passwords do not match';
        }
    } else {
        $message = 'You must agree to the terms and conditions';
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Learner</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="topofpage">
    <img src="logo.PNG" alt="Fluingo Website Logo" class="logo">   
</div>
<div class="cont">
    <h2 class="signTitle">Sign up</h2>
    <div class="content-container">
        <div class="contentedit">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="fname">First Name: <span class="asterisk">*</span></label>
                <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>
                <label for="lname">Last Name: <span class="asterisk">*</span></label>
                <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>
                <label for="email">Email: <span class="asterisk">*</span></label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="password">Password: <span class="asterisk">*</span></label>
                <input type="password" id="password" name="password" placeholder="Enter a password" required>
                <label for="confirm_password">Confirm Password: <span class="asterisk">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                <label>
                    <input type="checkbox" name="terms" required> I agree to the Terms & Conditions
                </label>
                <div class="clearfix">
                    <button type="submit" name="submitBtn" class="signupbtn">Sign Up</button>
                    <button type="button" class="cancelbtn">Cancel</button>
                </div>
                <?php if ($message): ?>
                    <p style="color: red;"><?= $message ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<div class="signin-link">
    Already have an account? <a href="#">Sign in</a>
</div>
<div class="footer-links">
    <a href="PrivacyPolicy.html">Privacy Policy</a>
    <a href="TermsAndConditions.html">Terms & Conditions</a>
    <a href="ContactUs.html">Contact Us</a>
</div>
</body>
</html>
