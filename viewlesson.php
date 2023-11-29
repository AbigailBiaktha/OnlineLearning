<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include("logic/lesson/getlesson.php") ?>

    <h1><?php echo $row['title']; ?></h1>
    <p><?php echo $row['content']; ?></p>
    <img src='<?php echo $row['file']; ?>' width='100'>


</body>

</html>