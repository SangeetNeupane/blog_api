<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'blog_api';
$con = mysqli_connect($host, $user, $pwd, $db) or die("Could Not Connect Database Server");


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'], $data['title'], $data['description'], $data['category_id'])) {
        $id = intval($data['id']);
        $title = $con->real_escape_string($data['title']);
        $description = $con->real_escape_string($data['description']);
        $category_id = $con->real_escape_string($data['category_id']);

       
        $result = $con->query("UPDATE blogs SET title='$title', description='$description', category_id='$category_id' WHERE id=$id");

        if ($con->affected_rows > 0) {
            echo json_encode(["success" => true, "message" => "Blog updated successfully"]);
        } else {
            echo json_encode(["error" => "Blog not found or no changes made"]);
        }
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
} else {
    echo json_encode(["error" => "Only PUT method is allowed"]);
}

mysqli_close($con);

?>
