<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['updateBtn'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];


    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        $fileName = $_FILES['file'];


        $sqlone = " SELECT * FROM lesson WHERE id = $id";
        $result = mysqli_query($conn, $sqlone);
        $row = mysqli_fetch_assoc($result);
        $file = $row['file'];
        unlink($file);

        $timestamp = time();
        $newFileName = $timestamp . '_' . $fileName['name'];
        $uploadPath = 'storage/lessonFiles/';

        $file = $uploadPath . $newFileName;

        move_uploaded_file($fileName['tmp_name'], $file);

        $updatesql = "UPDATE lesson SET title = '$title', content = '$content', file = '$file' WHERE id = '$id'";

        if (mysqli_query($conn, $updatesql)) {
            header("location:adminclassview.php?id=$row[class_id]");
        }
    } else {
        $updatesql = "UPDATE lesson SET title = '$title', content = '$content' WHERE id = '$id'";

        if (mysqli_query($conn, $updatesql)) {
            header("location:adminclassview.php?id=$row[class_id]");
        }
    }
}
