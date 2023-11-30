<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("logic/class/getclass.php") ?>
    <?php include("logic/lesson/createlesson.php") ?>


    <h1><?php echo $row['id']; ?></h1>
    <h1><?php echo $row['name']; ?></h1>
    <p><?php echo $row['description']; ?></p>
    <img src='<?php echo $row['image']; ?>' width='100'>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="class_id" value="<?php echo $row['id']; ?>" hidden>
        <input type="text" name="title">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <input type="file" name="file">
        <button type="submit" name="addLesson">Add</button>

    </form>


</body>



</html>