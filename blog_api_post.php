<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'blog_api';
$con = mysqli_connect($host, $user, $pwd, $db) or die("Could Not Connect Database Server.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['title'], $data['description'], $data['category_id'])) {
        $title = $con->real_escape_string($data['title']);
        $description = $con->real_escape_string($data['description']);
        $category_id = $con->real_escape_string($data['category_id']);
        $con->query("INSERT INTO blogs (title, description, category_id) VALUES ('$title', '$description', '$category_id')");
        echo json_encode(["success" => true, "id" => $con->insert_id]);
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
} else {
    echo json_encode(["error" => "Only POST method is allowed"]);
}

mysqli_close($con);
?>
