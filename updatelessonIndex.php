<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("logic/lesson/getlesson.php") ?>
    <?php include("logic/lesson/updatelesson.php") ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>">
        </div>

        <div>
            <label for="">File</label>
            <input type="file" name="file">
        </div>

        <div>
            <label for="">content</label>
            <textarea name="content" id="" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
        </div>
        <div>
            <button type="submit" name="updateBtn">Submit</button>

        </div>

    </form>

</body>

</html>