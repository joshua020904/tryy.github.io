<?php
// Database connection settings
$host = "localhost:8001"; // Change to your database host
$username = "username"; // Change to your database username
$password = "password"; // Change to your database password
$database = "mydb1"; // Change to your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check user credentials
$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
        // You can redirect to a welcome page here.
    } else {
        echo "Login failed. Please check your credentials.";
    }
} else {
    echo "Login failed. Please check your credentials.";
}

$conn->close();
?>
