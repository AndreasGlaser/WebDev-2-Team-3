<?php
$id = $_GET["id"];
$servername = "localhost";
$username = "root";
$password = "WD2aacdnt";
$dbname = "MathCollab";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT answer FROM exercises WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["answer"];
}
$conn->close();
?>
