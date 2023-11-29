<?php

require_once(__DIR__ . "/../connect.php");
$id = $_GET['id'];

$sql = "SELECT * FROM lesson WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
