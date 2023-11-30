
<body>
    <?php include("logic/class/getclass.php") ?>
    <?php include("logic/lesson/createlesson.php") ?>

    <h1><?php echo $row['name']; ?></h1>
    <p><?php echo $row['description']; ?></p>
    <img src='<?php echo $row['image']; ?>' width='100'>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="class_id" value="<?php echo $row['id']; ?>" hidden>

        <table>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>Content:</td>
                <td><textarea name="content" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>File:</td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="addLesson">Add</button></td>
            </tr>
        </table>
    </form>

    <?php include("logic/lesson/readlesson.php")  ?>

</body>

</html>
