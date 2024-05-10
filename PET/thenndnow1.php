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

// Fetch the latest entry from the thennow table
$sql = "SELECT * FROM thennow ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $petName = $row['pet_name'];
    $beforImage = $row['befor'];
    $aftImage = $row['aft'];
} else {
    // Handle the case when no data is found
    echo "No data found in the thennow table.";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thennow</title>
    <style>
        body {
            font-family: 'Lucida Sans', Arial, sans-serif;
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Adjust the background color as needed */
            
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
        .wrap {
    width: 145vh;
    background-color: aliceblue;
    padding: 10px;
    text-align: center;
    border-radius: 20px;
    color: black;
    display: flex;
    align-items: center;
    margin: 10px;
    padding: 10px;
    border: 2px solid grey; /* Add a 2px solid border with color #333 (you can change the color as needed) */
}



     .container {
    width: 20%; /* Set the width to 20% of the parent container */
    margin-right: 20px; /* Remove any default margin */
    margin-top:50px;
    padding: 20px;
    float: right; /* Align to the right */
    background-color: aliceblue;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 20px 0 black;
    border-radius: 20px;
    color: black;
 }

.clearfix::after {
    content: "";
    display: table;
    clear: both;
}


        .box {
            border-radius: 20px;
            border-color: none;
            margin-left: 5px;
        }

        .form {
            margin: 10px 0;
            align-self: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: small;
        }

        input {
            width: 140px;
        }

        button[type="submit"] {
            background-color: grey;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
        }

       

       
        .active {
            text-decoration: none;
            color: white;
        }
        

         img {
            width: 240px; /* Set the fixed width */
            height: 250px; /* Set the fixed height */
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .form1 {
            display: inline-block;
            margin: 10px;
            margin-right: 90px;
        }
        .form2 {
            display: inline-block;
            margin: 10px;
        }
        .second-part {
    width: 70%; /* Set the width to 75% of the parent container */
    margin: 0; /* Remove any default margin */
    padding: 20px;
    background-color: #ffffff; /* Adjust the background color as needed */
    float: left; /* Align to the left */
    
}



        footer {
            margin-top: 50px;
            background-color: rgb(37, 27, 27);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 10px;
            clear: both;
            bottom: 0%;
        }

    </style>
</head>

<body>
    <div class="first-part">
        <h1>Then & Now!</h1><br><br>
    </div> 
    
    <div class="second-part">
        
        <?php

// Fetch all entries from the thennow table
$sql = "SELECT * FROM thennow ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display each entry
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $petName = $row['pet_name'];
        $beforImage = $row['befor'];
        $aftImage = $row['aft'];

        // Display the entry
        echo '<div class="second-part">';

        echo '<div class="wrap">';
        echo ' <div class="form1">';
        echo ' <p for="username"><img src="images\user.png" alt="Username" style="width: 20px; height: 20px; display: inline-block; vertical-align: middle; margin-right: 5px;">'. " " . $username . '</p>';
        echo '   <p for="petName"><img src="images\paw.png" alt="Petname" style="width: 20px; height: 20px; display: inline-block; vertical-align: middle; margin-right: 5px;">' . $petName . '</p>';
        echo '     <br><br>';
        echo '  </div>';
        echo '  <div class="form2">';
        echo '     <p for="befor">Then</p>';
        echo '      <img src="data:image/jpeg;base64,' . $beforImage . '" alt="Before Image">';
        echo '   </div>';
        echo '   <div class="form2">';
        echo '       <p for="aft">Now</p>';
        echo '       <img src="data:image/jpeg;base64,' . $aftImage . '" alt="After Image">';
        echo '    </div>';
        echo ' </div>';
        echo '</div>';
    }
} else {
    // Handle the case when no data is found
    echo "No data found in the thennow table.";
}

// Close the database connection
$conn->close();
?>
</div>
 
<div class="clearfix">
        <div class="container">
            <form method="POST" action="thenndnow.php" enctype="multipart/form-data">
                <h2>Want to add your Pets?</h2>
                <div class="form">
                    <label for="username">UserName:</label>
                    <input class="box" type="text" id="username" name="username" required>
                </div>
                <div class="form">
                    <label for="petName">Pet Name:</label>
                    <input class="box" type="text" id="pet_name" name="pet_name" required>
                </div>
                <div class="form">
                    <label for="befor">Before Image:</label>
                    <input class="box" type="file" id="befor" name="befor" accept="images/*" required>
                </div>
                <div class="form">
                    <label for="aft">After Image:</label>
                    <input class="box" type="file" id="aft" name="aft" accept="images/*" required>
                </div>
                <button type="submit" name="adding">Post</button>
            </form>
        </div>
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