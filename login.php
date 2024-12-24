<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'estore';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure form fields are submitted
    if (!isset($_POST['email'], $_POST['password'])) {
        die("Email and password fields are required!");
    }

    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Admin login
    if ($email === 'Admin@gmail.com' && $password === 'admin123') {
        header('Location: index (2).php');
        exit;
    }

    // User login
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            header('Location: home.php');
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }
}

$conn->close();
?>
