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
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = (int)$_POST['age'];
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
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
                $sqlUser = "INSERT INTO users (email, password, FirstName, LastName, city) VALUES ('$email', '$password', '$firstname', '$lastname', '$city')";
                if ($conn->query($sqlUser) === TRUE) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userid'] = $email; // email as user id
                    $_SESSION['username'] = $firstname;
                    header("Location: PartnerPage.php");
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
    <title>Sign Up Partner</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="topofpage">
    <img src="logo.png" alt="Fluingo Website Logo" class="logo">   
</div>
<div class="cont">
    <h2 class="signTitle">Sign up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fname">First Name: <span class="asterisk">*</span></label>
        <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>

        <label for="lname">Last Name: <span class="asterisk">*</span></label>
        <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>

        <label for="email">Email: <span class="asterisk">*</span></label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="gender">Gender: <span class="asterisk">*</span></label>
        <div class="radio-buttons">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>

        <label for="age">Age: <span class="asterisk">*</span></label>
        <input type="number" id="age" name="age" min="18" max="80" placeholder="Select" required>

        <label for="password">Password: <span class="asterisk">*</span></label>
        <input type="password" id="password" name="password" placeholder="Enter a password" required>

        <label for="confirm_password">Confirm Password: <span class="asterisk">*</span></label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

        <label for="photo">Upload a Photo:(Optional)</label>
        <input type="file" id="photo" name="photo" accept="image/*">

        <label for="phone">Phone Number: <span class="asterisk">*</span></label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter your phone number in the format 000-000-0000">

        <label for="city">City: <span class="asterisk">*</span></label>
        <input type="text" id="city" name="city" placeholder="City" required>

        <label for="bio">Bio: <span class="asterisk">*</span></label>
        <textarea name="bio" id="Bio" rows="5" placeholder="Tell us about yourself: languages spoken, cultural knowledge, etc"></textarea>

        <label>
            <input type="checkbox" name="terms"> I agree to the Terms & Conditions
        </label>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Sign Up</button>
            <button type="button" class="cancelbtn">Cancel</button>
        </div>
        <?php if ($message): ?>
            <p style="color: red;"><?= $message ?></p>
        <?php endif; ?>
    </form>
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
