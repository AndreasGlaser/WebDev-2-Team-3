<?php
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

$sql = "SELECT knowledgePoints FROM student WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["knowledgePoints"];
}
$conn->close();
?>
