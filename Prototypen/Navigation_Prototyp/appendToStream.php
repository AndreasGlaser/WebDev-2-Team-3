<?php
$id = $_GET["id"];
$userid = $_GET["userid"];
$servername = "localhost";
$username = "root";
$password = "WD2aacdnt";
$dbname = "yii2advanced";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, question, answer, wrong1, wrong2, wrong3 FROM exercises WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//$sql = "INSERT INTO stream VALUES ($id, $row[type], $row[question], $row[answer], $row[wrong1], $row[wrong2], $row[wrong3], NULL ";
$sql = "INSERT INTO `stream` (`type`, `question`, `answer`, `wrong1`, `wrong2`, `wrong3`, `user`) VALUES ('$row[type]', '$row[question]', '$row[answer]', '$row[wrong1]', '$row[wrong2]','$row[wrong3]', $userid)";
//$result = $conn->query($sql);
$conn->query($sql);
$conn->close();



?>






