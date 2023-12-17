<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

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

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch tickets for the logged-in user
$sql = "SELECT * FROM tickets WHERE user_id = '$user_id'";
$result = $conn->query($sql);

// Display the tickets
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Title:</strong> " . $row["title"] . "</p>";
        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No tickets found for this user.</p>";
}

$conn->close();
?>