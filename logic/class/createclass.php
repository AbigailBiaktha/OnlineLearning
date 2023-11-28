<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['addBtn'])) {
    $name = $_POST['name'];
    $image = null;
    $description = $_POST['description'];

    if (isset($_FILES['image'])) {
        $imgName = $_FILES['image'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        if (in_array($imgName['type'], $allowedTypes)) {
            $timestamp = time();
            $newImageName = $timestamp . '_' . $imgName['name'];
            $uploadPath = 'storage/classImage/';

            $image = $uploadPath . $newImageName;

            move_uploaded_file($imgName['tmp_name'], $image);
        } else {
            return "file type error";
        }
    }

    $sql = "INSERT INTO `class` (name, image, description) VALUES ('$name', '$image', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return;
    } else {
        echo "Fail";
    };
}
