<!DOCTYPE html>
<html>
 
<head>
    <title>InsertRate</title>
</head>
 
<body>
    
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "flungo");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $rate =  $_REQUEST['rating'];
        $review = $_REQUEST['review'];
        $pname = $_REQUEST['partner_name'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO college  VALUES ('$review', 
            '$rate','','$email','$name','$pname')";
         
        if(mysqli_query($conn, $sql)){
           
                header("Location: homepageL.php");  
                
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
   
</body>
 
</html>