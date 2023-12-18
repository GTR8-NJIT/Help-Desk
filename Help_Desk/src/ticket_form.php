<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Need Help!</title>
</head>
<body>
    <h2>Create New Ticket</h2>
    <form method="post" action="process_ticket.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit Ticket">
    </form>
</body>
</html>
