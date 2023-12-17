<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<h2>Welcome to the Dashboard</h2>

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

// Retrieve tickets from the database
$sql = "SELECT id, title, description, created_at FROM tickets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h3>Open Tickets</h3>";
  echo "<table>";
  echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Created At</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["title"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "<td>" . $row["created_at"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "<p>No open tickets found.</p>";
}

$conn->close();
?>

</body>
</html>
