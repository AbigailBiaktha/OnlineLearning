<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['addBtn'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $image = null;
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

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
