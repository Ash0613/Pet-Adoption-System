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
if (isset($_POST['addCat'])) {
    $catName = $_POST['cat_name'];
    $catBreed = $_POST['cat_breed'];
    $catAge = $_POST['cat_age'];
    $catGender = $_POST['cat_gender'];
    $healthCondition = $_POST['cat_health_condition'];
    $details = $_POST['cat_details'];

    // Process image data
    $catImageData = base64_encode(file_get_contents($_FILES['cat_image']['tmp_name']));

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO cats (cat_name, cat_breed, cat_age, cat_gender, cat_health_condition, cat_image, cat_details) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $catName, $catBreed, $catAge, $catGender, $healthCondition, $catImageData, $details);

    if ($stmt->execute()) {
        echo "Cat added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
