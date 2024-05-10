<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "pet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM blogs ORDER BY date_created DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo "[]";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $title = $conn->real_escape_string($data['title']);
    $content = $conn->real_escape_string($data['content']);
    $author = $conn->real_escape_string($data['author']);

    $sql = "INSERT INTO blog_posts (title, content, author) VALUES ('$title', '$content', '$author')";
    echo "SQL Query: $sql";
    if ($conn->query($sql) === TRUE) {
        echo '{"status": "success"}';
    } else {
        echo '{"status": "error", "message": "' . $conn->error . '"}';
    }
}

$conn->close();
?>
