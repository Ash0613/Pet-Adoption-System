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
if (isset($_POST['adding'])) {
    
    // Process image data
    $userName = $_POST['username'];
    $petName = $_POST['pet_name'];
    $firstImageData = base64_encode(file_get_contents($_FILES['befor']['tmp_name']));
    $secondImageData = base64_encode(file_get_contents($_FILES['aft']['tmp_name']));


    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO thennow (username, pet_name, befor, aft) VALUES (?, ?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userName,  $petName, $firstImageData, $secondImageData);

    if ($stmt->execute()) {
        echo " added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
