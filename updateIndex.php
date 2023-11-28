<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("logic/class/getclass.php") ?>
    <?php include("logic/class/updateclass.php") ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
        <div>
            <label for="">Name of class</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div>
            <label for="">Image</label>
            <input type="file" name="image">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"><?php echo $row['description']; ?></textarea>
        </div>
        <div>
            <button type="submit" name="updateBtn">Submit</button>

        </div>

    </form>

</body>

</html>