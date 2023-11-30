
<!-- Class List Section -->
<?php include("./logic/class/readclass.php"); ?>


<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">
         
            <div class="row mb-3">
                <div class="col-md-6"> 
                </div>
                <div class="col-md-3 text-right">
                    <a href="indexOne.php" class="btn btn-success">Add Course</a>
                </div>
            </div>

            <!-- Class Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width: 40%;">Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo mb_strimwidth($row['name'], 0, 20, "..."); ?></td>
                            <td><?php echo mb_strimwidth($row['description'], 0, 30, "..."); ?></td>
                            <td>
                                <a href="adminclassview.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="updateindex.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="logic/class/deleteclass.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


