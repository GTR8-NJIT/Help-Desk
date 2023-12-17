<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
</head>
<body>
    <h1>Create Support Ticket</h1>
    <form action="process_ticket.php" method="post">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br><br>
        <label for="message">Message:</label>
        <textarea name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Create Ticket">
    </form>
</body>
</html>