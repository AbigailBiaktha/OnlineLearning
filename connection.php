<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "onlinelearning";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Connection Failed ");
}

?>