<?php include("logic/class/createclass.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <form method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name of class</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="">Image</label>
            <input type="file" name="image">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit" name="addBtn">Submit</button>

        </div>

    </form>
    <h1>Hello</h1>


    <div>
        <table>
            <?php include("logic/class/readclass.php") ?>
        </table>

    </div>




</body>

</html>