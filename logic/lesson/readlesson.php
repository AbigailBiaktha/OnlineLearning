<?php
require_once(__DIR__ . "/../connect.php");
$class_id = $row['id'];

$sql = "SELECT * FROM lesson WHERE class_id = $class_id";
$result = mysqli_query($conn, $sql);
