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

$sql = "SELECT id, question, answer, wrong1, wrong2, wrong3 FROM exercises WHERE id = $id";
$result = $conn->query($sql);
$order = rand(1,4);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if ($order==1){
    echo '<h2>'.$row["question"].'</h2><div class="form-check">
    <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["answer"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong1"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong2"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong3"].
    '</label></div>';
  }
  else if ($order==2){
    echo '<h2>'.$row["question"].'</h2><div class="form-check">
    <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong1"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["answer"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong2"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong3"].
    '</label></div>';
  }
  else if ($order==3){
    echo '<h2>'.$row["question"].'</h2><div class="form-check">
    <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong2"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong1"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["answer"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong3"].
    '</label></div>';
  }
  else if ($order==4){
    echo '<h2>'.$row["question"].'</h2><div class="form-check">
    <label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong3"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong1"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["wrong2"].
    '</label></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio">'.$row["answer"].
    '</label></div>';
  }
} else {
   echo "0 results";
}
$conn->close();
?>
