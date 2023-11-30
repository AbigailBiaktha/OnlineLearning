<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST['addLesson'])) {
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
    $class_id = $_POST['class_id'];
    $file = null;

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileName = $_FILES['file'];

        $timestamp = time();
        $newfileName = $timestamp . '_' . $fileName['name'];
        $uploadPath = 'storage/lessonFiles/';

        $file = $uploadPath . $newfileName;

        move_uploaded_file($fileName['tmp_name'], $file);
        $sql = "INSERT INTO `lesson` (title, content, file, class_id) VALUES ('$title', '$content', '$file', '$class_id')";
    } else {
        $sql = "INSERT INTO `lesson` (title, content, class_id) VALUES ('$title', '$content', '$class_id')";
    }


    $result = mysqli_query($conn, $sql);
    if ($result) {
        return;
    } else {
        echo "Fail";
    };
}
