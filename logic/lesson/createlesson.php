<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['addLesson'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $class_id = $_POST['class_id'];
    $file = null;

    if (isset($_FILES['file'])) {
        $fileName = $_FILES['file'];

        $timestamp = time();
        $newfileName = $timestamp . '_' . $fileName['name'];
        $uploadPath = 'storage/lessonFiles/';

        $file = $uploadPath . $newfileName;

        move_uploaded_file($fileName['tmp_name'], $file);
    }

    $sql = "INSERT INTO `lesson` (title, content, file, class_id) VALUES ('$title', '$content', '$file', '$class_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return;
    } else {
        echo "Fail";
    };
}
