<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'broken_auth_demo');

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Weak password check (plain text password comparison)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
