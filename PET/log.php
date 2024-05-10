<?php
// Database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "pet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pswd'];

    // Check if the credentials belong to a user
    $sqlUser = "SELECT * FROM users WHERE email = '$email' AND username = '$username' AND pswd = '$password'";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser->num_rows > 0) {
        // Successful user login, redirect to the home screen or any other page
        header("Location: home.html");
        exit();
    }

    // Check if the credentials belong to an admin
    $adminUsername = "admin";
    $adminPassword = "adminpswd"; // You should hash this password in a real-world scenario

    if ($username == $adminUsername && $password == $adminPassword) {
        // Successful admin login, redirect to the admin dashboard or any other page
        header("Location: enter.html");
        exit();
    }

    // Invalid credentials, you may display an error message or redirect to a login failure page
    echo "Invalid credentials";
}

$conn->close();
?>
