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

// Fetch the other details based on the name from the URL parameter
if (isset($_GET['name'])) {
    $otherName = $_GET['name'];
    $sql = "SELECT * FROM others WHERE other_name = '$otherName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $otherName = $row['other_name'];
        $otherBreed = $row['other_breed'];
        $otherAge = $row['other_age'];
        $otherGender = $row['other_gender'];
        $healthCondition = $row['other_health_condition'];
        $otherImageData = $row['other_image'];
        $details = $row['other_details'];
    } else {
        echo "Other not found.";
        exit;
    }
} else {
    echo "Other name not provided.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $otherName; ?> Details</title>
    <style>
        body {
            overflow-x: hidden;
            font-family: "Lucida Console", Courier, monospace;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .first-part {
            height: 30vh;
            background: url('https://www.shutterstock.com/image-photo/dog-giving-paw-woman-dogs-600nw-1507368191.jpg') center/cover;
            background-size: cover;
            color: #0a0808;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .other-details {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            margin: 5px 20px;
        }

        .other-details img {
            width: 250px;
            height: auto;
            border-radius: 8px;
        }

        .other-info {
            flex: 1;
            margin-left: 20px;
        }

        .about-section {
            margin-top: 10px;
            padding: 20px;
            background-color: #fff;
            font-family: 'Lucida Sans', Arial, sans-serif;
            width: 80%;
        }
        .adopt {
            width: 70vh;
            height:30vh;
            margin-top: 30px;
            margin-right: 30px;
            background-color: rgb(69, 65, 65);
            border-radius: 8px;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 20px;
}
        .adopt1 {
            width: 50%;
            margin-top: 30px;
            padding: 20px;
            margin-right: 10%;
        }

        .adopt-button {
            background-color: white;
            color: brown;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 20px;
            border: 2px solid white;
        }
        footer {
            margin-top: 50px;
            background-color: rgb(37, 27, 27);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 10px;
            clear: both;
        }
    </style>
</head>
<body>
    <div class="first-part">
        <h1>Ready To Adopt An Other!</h1>
        <br><br>
    </div>
    <div class="other-details">
        <img src="data:image/jpeg;base64,<?php echo $otherImageData; ?>" alt="Other Image">
        <div class="adopt1">
            <h2><?php echo $otherName; ?></h2>
            <p><strong>Breed:</strong><?php echo $otherBreed; ?></p>
            <p><strong>Age:</strong><?php echo $otherAge; ?></p>
            <p><strong>Gender:</strong><?php echo $otherGender; ?></p>
        </div>
        <div class="bg">
                <img   src="https://img.freepik.com/premium-vector/paw-prints-dog-footprint-isolated-white-background_101884-1600.jpg"></p>
            </div>
        <div class="adopt">
            <p>Considering <?php echo $otherName; ?> for adoption?</p>
            <a href="adoptform.html" class="adopt-button">Adopt <?php echo $otherName; ?></a>
        </div>
    </div>
    <div class="about-section">
        <h3>About <?php echo $otherName; ?></h3>
        <hr style="height: 3px; color: #0a0808; background-color: #0a0808; border: none; margin-right:40%;">
        <p><strong>Health Condition:<br></strong><?php echo $healthCondition; ?></p>
        <p><strong>Details:<br></strong><?php echo $details; ?></p>
    </div>
    <footer>
        <div>
            <a href="#" style="color: black; margin: 0 10px;">
                <img src="images/insta.png" alt="Instagram" style="width: 20px; height: 20px;">
            </a>
            <a href="#" style="color: black; margin: 0 10px;">
                <img src="images/fb.png" alt="Facebook" style="width: 20px; height: 20px;">
            </a>
            <a href="#" style="color: black; margin: 0 10px;">
                <img src="images/wa.png" alt="Whatsapp" style="width: 20px; height: 20px;">
            </a>
            <br>
        </div>
        <div>
            All rights reserved.
        </div>
        <div>
            1234 Main Street, Karnataka, India
        </div>
    </footer>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
