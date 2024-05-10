<?php
// Replace these values with your actual database credentials
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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["namee"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Insert data into the database (replace 'your_table_name' with your actual table name)
    $sql = "INSERT INTO contact (namee, phone, message) VALUES ('$name', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>