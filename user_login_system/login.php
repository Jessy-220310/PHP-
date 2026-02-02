<?php
// 1. Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// 2. Connect to database
$conn = new mysqli("localhost", "root", "", "user_auth");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Fetch user by email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // 4. Verify password
    if (password_verify($password, $row['password'])) {
        echo "Login successful! Welcome " . $row['username'];
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

$conn->close();
?>