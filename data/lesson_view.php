
<body>

    <?php include("logic/lesson/getlesson.php") ?>

    <h1><?php echo $row['title']; ?></h1>
    <p><?php echo $row['content']; ?></p>
    <img src='<?php echo $row['file']; ?>' width='100'>

</body>

</html>
