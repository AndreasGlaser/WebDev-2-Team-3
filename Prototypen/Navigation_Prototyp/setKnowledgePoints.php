<?php
$knowledgePoints = $_GET["knowledgePoints"];
$id = $_GET["id"];
$servername = "localhost";
$dbusername = "root";
$password = "WD2aacdnt";
$dbname = "yii2advanced";

$conn = new mysqli($servername, $dbusername, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE student SET knowledgePoints = $knowledgePoints WHERE id = $id";
$conn->query($sql);
$conn->close();
?>
