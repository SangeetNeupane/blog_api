<?php
   $host = 'localhost';
   $user = 'root';
   $pwd = '';
   $db = 'blog_api';
   $con = mysqli_connect($host, $user, $pwd, $db) or die("Could Not Connect Database Server.");
   
   if (isset($_GET['id'])) {
       $id = intval($_GET['id']);
       $result = $con->query("SELECT * FROM blogs WHERE id = $id");
       echo json_encode($result->fetch_assoc() ?: ["error" => "Blog not found"]);
   } else {
       $result = $con->query("SELECT * FROM blogs");
       $blogs = [];
       while ($row = $result->fetch_assoc()) {
           $blogs[] = $row;
       }
       echo json_encode($blogs);
   }
   
   mysqli_close($con);
   
?>