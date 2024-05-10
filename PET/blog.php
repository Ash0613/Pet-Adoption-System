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

// Collect data from the form
$title = $_POST['title'];
$content = $_POST['content'];

// Insert data into the database
$sql = "INSERT INTO blogs (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Blog submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
