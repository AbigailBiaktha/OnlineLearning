<?php 
include("logic/class/createclass.php");
 ?>

<body>

    <form method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Name of class</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>

        <div class="d-flex justify-content-between">
              <button type="submit" name="addBtn" class="btn btn-primary" style="background-color: #2F4F4Fff;">Submit</button>
              <a href="admincourseview.php" class="btn btn-primary" style="background-color: #2F4F4Fff;">Back</a>
       </div>

</div>


    </form>

    <div class="mt-5">
        <table class="table table-bordered">
            <?php include("logic/class/readclass.php") ?>
        </table>
    </div>

    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
