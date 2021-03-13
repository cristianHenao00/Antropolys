<?php
$id = $_GET['id'];
$mysqli = new mysqli("localhost", "u341094424_antropolys", "Antropolys2021*", "u341094424_antropolys");
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$sql = "SELECT * FROM img_preg WHERE idimg_preg = $id";
$result1 = $mysqli->query($sql);
if ($result1->num_rows > 0) {//Si hay resultados…
    $img = $result1->fetch_array(MYSQLI_ASSOC);
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Content-type: ".$img['type_img']);
    echo $img['img'];
}



