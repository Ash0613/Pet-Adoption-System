<?php
// Database connection code (replace with your actual database credentials)
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "pet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$petname = $_POST['petname'];
$residence = $_POST['residence'];

// Insert data into the database
$sql = "INSERT INTO adoption_form (name, address, phone, petname, residence) 
        VALUES ('$name', '$address', '$phone', '$petname', '$residence')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>