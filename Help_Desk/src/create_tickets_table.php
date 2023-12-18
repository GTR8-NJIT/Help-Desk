<?php
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

// SQL query to create the tickets table
$sql = "CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute query to create 'tickets' table
if ($conn->query($sql) === TRUE) {
    echo "Table 'tickets' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>