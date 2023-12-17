<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ticket_title"]) && isset($_POST["ticket_description"]) && !empty($_POST["ticket_title"]) && !empty($_POST["ticket_description"])) {
        // Get the logged-in user's username
        $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Guest";
        
        // Get the ticket details from the form
        $ticket_title = $_POST["ticket_title"];
        $ticket_description = $_POST["ticket_description"];

        
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
            
        $insert_query = "INSERT INTO support_tickets (username, title, description) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $insert_query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $username, $ticket_title, $ticket_description);
            if (mysqli_stmt_execute($stmt)) {
                echo "Ticket created successfully.";
            } else {
                echo "Error creating the ticket: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Database query error: " . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    } else {
        echo "Please fill in all the required fields.";
    }
} else {
    header("Location: create_ticket.php");
    exit();
}
