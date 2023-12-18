<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $title = $_POST['title'];
    $description = $_POST['description'];

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

    // Ensure that the 'tickets' table exists in the database
    $check_table = "SHOW TABLES LIKE 'tickets'";
    $result = $conn->query($check_table);
    if ($result->num_rows == 0) {
        die("Table 'tickets' doesn't exist");
    }

    // Get user ID from the session (replace with your method of getting the user ID)
    $user_id = $_SESSION['user_id'];

    // Insert ticket data into the 'tickets' table
    $sql = "INSERT INTO tickets (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New ticket created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
