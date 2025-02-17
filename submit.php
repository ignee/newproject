<?php
// AWS RDS Database credentials
$servername = "database-1.c1eyg48ioiyk.ap-south-1.rds.amazonaws.com"; // Replace with your RDS endpoint
$username = "admin";  // Replace with your RDS username
$password = "secure123";  // Replace with your RDS password
$dbname = "myapp1";    // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and retrieve the form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO new_table (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);  // "ss" means two string parameters

// Execute the query and check if successful
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
