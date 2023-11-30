
<body>
    <?php include("logic/lesson/getlesson.php") ?>
    <?php include("logic/lesson/updatelesson.php") ?>


    <div class="container mt-5">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control-file" name="file">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" rows="5"><?php echo $row['content']; ?></textarea>
            </div>

            <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
        </form>
    </div>

   
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
