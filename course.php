<?php include("layout/classnavbar.php") ?>
<?php include("logic/class/getclass.php") ?>

<div class="row flex  mt-3 mx-3 mb-5">

    <div class="pt-md-2 ps-md-5 col-md-2">
        <a href="classes.php"><button class="btn btn-primary mb-2 rounded"><i class="bi bi-arrow-left-circle-fill"></i> back</button></a>

    </div>
    <div class="col-md-8 border shadow bg-white rounded">
        <div class="pt-2 border-bottom border-5 border-primary">
            <img src='<?php echo $row['image']; ?>' class="img-fluid z-2 rounded " style=" width: 100%; max-height: 450px;">
        </div>
        <h1 class="mt-1 pt-4 pb-0 ms-2"><?php echo $row['name']; ?></h1>
        <hr class="border border-3 border-primary">
        <p class="text-dark px-4"><?php echo nl2br($row['description']); ?></p>
        <hr class="border border-3 border-primary">
        <?php include("logic/lesson/readlesson.php")  ?>
        <div class="container m-3">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <a href="lesson.php?id=<?php echo $row['id']; ?>">
                    <div class="shadow-sm p-1 my-2 lesson">
                        <h4><?php echo $row['title'] ?></h4>
                    </div>
                </a>
            <?php } ?>

        </div>

    </div>

</div>

<?php include("layout/classfooter.php") ?>