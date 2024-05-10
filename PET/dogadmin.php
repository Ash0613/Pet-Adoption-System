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

// Handle form submission
if (isset($_POST['addDog'])) {
    $dogName = $_POST['dog_name'];
    $dogBreed = $_POST['dog_breed'];
    $dogAge = $_POST['dog_age'];
    $dogGender = $_POST['dog_gender'];
    $healthCondition = $_POST['dog_health_condition'];
    $details = $_POST['dog_details'];

    // Process image data
    $dogImageData = base64_encode(file_get_contents($_FILES['dog_image']['tmp_name']));

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO dogs (dog_name, dog_breed, dog_age, dog_gender, dog_health_condition, dog_image, dog_details) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $dogName, $dogBreed, $dogAge, $dogGender, $healthCondition, $dogImageData, $details);

    if ($stmt->execute()) {
        echo "Dog added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
