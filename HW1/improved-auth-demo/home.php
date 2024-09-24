<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Check session timeout (e.g., 30 minutes)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();     // Unset all session variables
    session_destroy();   // Destroy the session
    header('Location: index.php');
    exit();
}

$_SESSION['last_activity'] = time(); // Update last activity time

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
