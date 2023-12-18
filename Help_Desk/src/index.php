<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check credentials (Insecure, for demonstration purposes only)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials (Replace this with database validation)
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Help Desk Ticketing System</title>
</head>
<body>
    <h1>Welcome to Helpdesk Ticketing System</h1>
    <h2>Log in to access your account</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>




