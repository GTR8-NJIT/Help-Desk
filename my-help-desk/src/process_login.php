<?php
session_start();

// Get input from the login form
$username = $_POST["username"];
$password = $_POST["password"];

// Database connection details
$servername = "mysql";
$username = "helpdesk_user";
$password = "helpdesk_password";
$dbname = "helpdesk_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate user credentials
$query = "SELECT id, username, password FROM users WHERE username = ?";
if ($stmt = $connection->prepare($query)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $dbUsername, $dbPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $dbPassword)) {
            // Password is correct, set session variables
            $_SESSION["user_id"] = $userId;
            $_SESSION["username"] = $dbUsername;
            
            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit(); 
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
} else {
    echo "Database error.";
}

$connection->close();
?>
