<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <style>
        body {
            overflow-x: hidden;
            font-family: "Lucida Console", Courier, monospace;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .first-part {
            height: 40vh;
            background: url('images/contact.jpg.jpg') center/cover;
            background-size: cover;
            color: #0a0808;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        
        .adopt1 {
            background-color: aliceblue;
             border-radius: 8px;
            width: 50%;
            margin-top: 30px;
            padding: 20px;
            margin-right: 10%;
            margin-left: 20px;
            border: 2px solid grey;
            margin-bottom: 30px;
        }

       
    </style>
</head>
<body>

<div class="first-part">
    <h1>Messages from users!</h1>
    <br><br>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select data from the contact table
$sql = "SELECT namee, phone, message FROM contact"; // Changed 'name' to 'namee'
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
    echo '<div class="adopt1" > ';
    echo "<p>Name: " . $row["namee"] . "</p>";
    echo "<p>Phone: " . $row["phone"] . "</p>";
    echo "<p>Message: " . $row["message"]. "</p>";
    echo "</div>";
    }
   
} else {
    echo '<div class="adopt1" > ';
    echo "0 results";
    echo "</div>";
}

$conn->close();
?>

</body>
</html>
