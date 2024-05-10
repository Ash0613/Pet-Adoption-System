<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "pet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $plainPassword = $_POST["pswd"];
    $phno = $_POST["phno"];
    $addr = $_POST["addr"];

    // Hash the password using bcrypt
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

    // SQL query to insert data into the users table
    $sql = "INSERT INTO users (email, username, pswd, phno, addr) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $email, $username, $hashedPassword, $phno, $addr);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: home.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

// Close connection
$conn->close();
?>
