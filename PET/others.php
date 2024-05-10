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

// Fetch data from the database
$sql = "SELECT other_name, other_image, other_breed, other_gender FROM others"; // Adjust the table and column names
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptable Others</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background-color: rgb(242, 242, 242);
            background:url('https://media.istockphoto.com/id/1166259623/vector/paw-print-track-on-white-background-vector-illustration.jpg?s=612x612&w=0&k=20&c=C3365O56W5vgPDlq4StE7MIOP9kLrEUZYefPUDoLs2w=');
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

        .swiper-container {
            width: 80%;
            margin: auto;
            margin-top: 7%;
            display: flex;
            position: relative;
        }

        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            flex: 0 0 auto;
        }

        .other-box {
            text-align: center;
            padding: 10px 5px;
            border: 1px solid #ccc;
            margin: 10px 5px;
            cursor: pointer;
            background-color: rgb(69, 65, 65);
            border-radius: 10px;
            color: #ccc;
            border-color: rgb(8, 7, 7);
            border-width: 3px;
            border-style: solid;
        }

        .other-box img {
            width: 160px;
            height: 170px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: absolute;
            cursor: pointer;
        }

        .swiper-button-next {
            right: 0;
            color: rgb(236, 233, 231)
        }

        .swiper-button-prev {
            left: 0;
            color: rgb(236, 233, 231)
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
        <h1>Ready To Adopt A Pet!</h1><br><br>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            // Loop through each row of the result set
            while ($row = $result->fetch_assoc()) {
                $otherName = $row['other_name'];
                $otherImageData = $row['other_image'];
                $otherBreed = $row['other_breed'];
                $otherGender = $row['other_gender'];

                echo '<div class="swiper-slide">';
                echo '<div class="other-box">';
                echo '<a href="other_details.php?name=' . urlencode($otherName) . '" style="text-decoration: none;  color: white;">';
                echo '<img src="data:image/jpeg;base64,' . $otherImageData . '" alt="Other Image">';
                echo '<hr>';
                echo '<h3>' . $otherName . '</h3>';
                echo '<h4>' . $otherBreed . " . " . $otherGender . '</h4>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Navigation Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
