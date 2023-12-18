<?php
session_start(); // Start the session

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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch ticket details from the form
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Insert ticket data into the 'tickets' table
    $sql = "INSERT INTO tickets (title, description) VALUES ('$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Successful ticket creation, redirect to the dashboard
        header("Location: dashboard.php");
        exit(); // Terminate the script after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

