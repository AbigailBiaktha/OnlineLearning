<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['updateBtn'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $id = $_POST['id'];


    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $imgName = $_FILES['image'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

        if (in_array($imgName['type'], $allowedTypes)) {
            $sqlone = " SELECT * FROM class WHERE id = $id";
            $result = mysqli_query($conn, $sqlone);
            $row = mysqli_fetch_assoc($result);
            $image = $row['image'];
            unlink($image);

            $timestamp = time();
            $newImageName = $timestamp . '_' . $imgName['name'];
            $uploadPath = 'storage/classImage/';

            $image = $uploadPath . $newImageName;

            move_uploaded_file($imgName['tmp_name'], $image);

            $updatesql = "UPDATE class SET name = '$name', description = '$description', image = '$image' WHERE id = '$id'";

            if (mysqli_query($conn, $updatesql)) {
                header("location:index.php");
            }
        } else {
            return "Image is only allowed!";
        }
    } else {
        $updatesql = "UPDATE class SET name = '$name', description = '$description' WHERE id = '$id'";

        if (mysqli_query($conn, $updatesql)) {
            header("location:index.php");
        }
    }
}
