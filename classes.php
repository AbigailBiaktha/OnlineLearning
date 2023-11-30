<?php require_once(__DIR__ . "/layout/header.php"); ?>
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5 mt-4">
        <h1 class="display-2 text-white mb-3 animated slideInDown">Our Courses</h1>
    </div>
</div>
<!-- Page Header End -->

<?php include("./logic/class/readclass.php"); ?>
<!-- Service Start -->
<div class="mb-5 pb-5">
    <div class="container-fluid container-service py-5">
        <div class="container py-5">
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <div class=" col-lg-3 col-md-6">
                        <div class="card wow fadeInUp mx-2" data-wow-delay="0.1s" style="min-height: 380px; max-height: 380px;">
                            <img class="card-img-top" src="<?php echo $row['image'] ?>" alt="Card image cap" style="min-height: 150px; max-height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20, "...") ?></h5>
                                <p class="card-text" style="min-height: 100px; max-height: 100px;"><?php echo mb_strimwidth($row['description'], 0, 110, "...") ?></p>
                                <?php if (!isset($_SESSION['loggedin'])) { ?>
                                    <a onClick='enterClass()' class=" btn btn-primary">View Course<i class="bi bi-chevron-double-right ms-1"></i></a>
                                <?php } else { ?>
                                    <a href="./viewclass.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Course<i class="bi bi-chevron-double-right ms-1"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                <?php } ?>

            </div>
        </div>
    </div>
</div>



<script>
    function enterClass() {
        var enterClass = confirm("You must be log in to view the course?");
        if (enterClass) {
            // If the user clicks "OK" in the confirmation dialog, proceed with the logout
            window.location.href = "login.php";
        } else {
            // If the user clicks "Cancel" in the confirmation dialog, do nothing (or handle it as needed)
        }
    }
</script>

<?php require_once(__DIR__ . "/layout/footer.php"); ?>