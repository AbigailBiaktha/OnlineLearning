<?php

require_once(__DIR__ . "/../connect.php");
$id = $_GET['id'];

$sqlone = " SELECT * FROM class WHERE id = $id";
$result = mysqli_query($conn, $sqlone);
$row = mysqli_fetch_assoc($result);
$image = '../../' . $row['image'];
unlink($image);

$sql = " DELETE FROM class WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location:../../admincourseview.php");
} else {
    echo "Delete Fail";
};
