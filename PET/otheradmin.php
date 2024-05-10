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
if (isset($_POST['addOther'])) {
    $otherName = $_POST['other_name'];
    $otherBreed = $_POST['other_breed'];
    $otherAge = $_POST['other_age'];
    $otherGender = $_POST['other_gender'];
    $healthCondition = $_POST['other_health_condition'];
    $details = $_POST['other_details'];

    // Process image data
    $otherImageData = base64_encode(file_get_contents($_FILES['other_image']['tmp_name']));

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO others (other_name, other_breed, other_age, other_gender, other_health_condition, other_image, other_details) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $otherName, $otherBreed, $otherAge, $otherGender, $healthCondition, $otherImageData, $details);

    if ($stmt->execute()) {
        echo "Other added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
