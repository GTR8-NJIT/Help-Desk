<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get user ID from session

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

// Fetch logged-in user's tickets
$sql = "SELECT * FROM tickets WHERE user_id = '$user_id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <h2>Incident/Ticket Management</h2>
    <p>Click below to manage incidents or support tickets:</p>
   
    <a href="ticket_form.php">Create New Incident/Ticket!</a> <!-- Link to redirect to ticket form -->
    <br>
    <a href="display_tickets.php">View All Incidents/Tickets</a> <!-- Link to redirect to ticket form -->
    <br>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>