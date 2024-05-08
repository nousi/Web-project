<?php
    // Define database connection constants
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','flungo');

    // Establish database connection
    if (!$con = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    // Select the database
    if(!mysqli_select_db($con, DB_NAME))
        die("Could not open the ".DB_NAME." database.");
    

    // Check if the form was submitted
    if(isset($_POST['save'])){
        $user_email=$_POST['email'];
        $password =$_POST['password'];
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $city =$_POST['city'];
        $location =$_POST['location'];
        $age =$_POST['age'];
        $gender =$_POST['gender'];
        $bio =$_POST['txtarea'];
        $phone=$_POST['phone'];

        // Check if email exists in the "partner" table
        $learner_query = "SELECT * FROM learner WHERE Uemail='$user_email'";
        $learner_result = mysqli_query($con, $learner_query);
        
        if(mysqli_num_rows($learner_result) > 0){
            $learner="UPDATE users SET  role='L' WHERE email='$user_email'";
        $learner_run=mysqli_query($con,$learner);
        } else {
        $learner="UPDATE users SET  role='P' WHERE email='$user_email'";
        $learner_run=mysqli_query($con,$learner);
        }
        
        
    
        $query="UPDATE users SET FirstName='$fname',LastName='$lname', city='$city',location='$location'  WHERE email='$user_email' ";
        $query_run=mysqli_query($con,$query);
    
        if($query_run){
            //$_SESSION['message']="updated";
            echo $bio;
            header('Location: LprofileView.php');
            exit(); // Stop further execution
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
?>
