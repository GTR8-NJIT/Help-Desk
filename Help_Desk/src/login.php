<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['loggedin_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
