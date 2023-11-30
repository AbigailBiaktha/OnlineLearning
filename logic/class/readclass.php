<?php

require_once(__DIR__ . "/../connect.php");

$sql = "SELECT * FROM class";
$result = mysqli_query($conn, $sql);
