<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $validUsers = [
        'user1' => 'password1',
        'user2' => 'password2',
        'user3' => 'password3'
    ];

    if (array_key_exists($username, $validUsers) && $validUsers[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HelpDesk Ticketing System</title>
</head>
<body>
    <h1>Welcome to Helpdesk Ticketing System</h1>
    <p>Log in to access your account or register as a new user.</p>

    <a href="login.php">Login</a>

    <h2>Incident/Ticket Management</h2>
    <p>Click below to manage incidents or support tickets:</p>

    <a href="create_ticket.php">Create New Incident/Ticket</a>
    <br>
    <br>
    <a href="view_tickets.php">View All Incidents/Tickets</a>
    <br>
    <br>
    <a href="logout.php">Logout</a>

  
</body>
</html>
