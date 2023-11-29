<?php
require_once(__DIR__ . "/../connect.php");
$id = $_GET['id'];

$sqlone = " SELECT * FROM lesson WHERE id = $id";
$result = mysqli_query($conn, $sqlone);
$row = mysqli_fetch_assoc($result);
$file = '../../' . $row['file'];
unlink($file);

$sql = " DELETE FROM lesson WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location:../../viewclass.php?id=$row[class_id]");
} else {
    echo "Delete Fail";
};
