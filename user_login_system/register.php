<?php
// 1. Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// 2. Encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 3. Connect to database
$conn = new mysqli("localhost", "root", "", "user_auth");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Insert data
$sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>