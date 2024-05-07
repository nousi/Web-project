<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Language Learning Request</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    main {
      max-width: 400px;
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    button {
      padding: 10px 15px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background-color: #3498db;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #2980b9;
    }

    .action-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .edit-btn, .cancel-btn {
      padding: 8px 12px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      transition: background-color 0.3s ease;
      background-color: #3498db;
      color: #fff;
    }

    .edit-btn:hover {
      background-color: #2980b9;
    }

    .cancel-btn:hover {
      background-color: #e74c3c;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
 
  <main>
    <h1>Language Learning Request</h1>

    
    <form id="languageForm" method="post" action="save_request.php">
      <label for="language">Language to Learn:</label>
      <select id="language" name="language" required>
        <option value="english">English</option>
        <option value="spanish">Spanish</option>
        <!-- Add more language options as needed -->
      </select>

      <label for="proficiency">Proficiency Level:</label>
      <select id="proficiency" name="proficiency" required>
        <option value="beginner">Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
      </select>

      <label for="schedule">Preferred Schedule:</label>
      <input type="text" id="preferredSchedule" name="preferredSchedule" placeholder="E.g., Monday to Friday, Sunday and Saturday, All week, Wednesday" required>

      <label for="duration">Session Duration (in hours):</label>
      <input type="text" id="sessionDuration" name="sessionDuration" placeholder="E.g., 6am to 8am " required>

      <button type="submit">Post Request</button>
    </form>
  </main>

  <script>
    function editRequest() {
      alert("Editing language learning request...");
      // Implement edit request functionality
    }

    function cancelRequest() {
      confirm("Are you sure you want to cancel your language learning request?");
      // Implement cancel request functionality
    }
  </script>

</body>
</html>



<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flungo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO request (Rnumber, languageToLearn, proficiencyLevel, preferredSchedule, sessionDuration, requestStatus, Uemail) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("isssiss", $Rnumber, $languageToLearn, $proficiencyLevel, $preferredSchedule, $sessionDuration, $requestStatus, $email);

// Set parameter values
$Rnumber = 1; // Assuming you want Rnumber as 1
$languageToLearn = $_POST["language"];
$proficiencyLevel = $_POST["proficiency"];
$preferredSchedule = $_POST["preferredSchedule"];
$sessionDuration = $_POST["sessionDuration"];
$requestStatus = "Pending"; // Default request status
$email = "Lana@gmail.com"; // Replace with appropriate email variable

// Execute SQL statement
if ($stmt->execute()) {
    echo "<Language learning request saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

?>
