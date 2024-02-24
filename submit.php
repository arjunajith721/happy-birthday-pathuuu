<?php
// Database connection parameters
$servername = "127.0.0.1:3306"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = "k23ch1418"; // Your MySQL password
$dbname = "pathu"; // Your MySQL database name
$tableName = "form_responses"; // Your table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert data into the table
$sql = "INSERT INTO $tableName (q1, q2, q3, q4, q5, feedback)
        VALUES (?, ?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $q1, $q2, $q3, $q4, $q5, $feedback);

// Set parameters and execute
$q1 = $_POST['q1']; // Assuming form data is submitted via POST method
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$feedback = $_POST['feedback'];
$stmt->execute();

echo "Form data inserted successfully";

// Close statement and connection
$stmt->close();
$conn->close();
?>
