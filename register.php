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
    $name = $conn->real_escape_string($_POST['name']);

    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

   
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

   
    $query = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "A user with this email or phone number already exists!";
    } else {
        
        $insertQuery = "INSERT INTO users (name,email, phone, password) VALUES ('$name','$email', '$phone', '$hashedPassword')";

        if ($conn->query($insertQuery) === TRUE) {
           
            header('Location: home.php');
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
