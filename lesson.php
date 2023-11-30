<?php include("layout/classnavbar.php"); ?>

<?php include("logic/lesson/getlesson.php"); ?>


<div class=" flex justify-content-center mt-3 mx-3 mb-5">

    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <a href="course.php?id=<?php echo $row['class_id'] ?>"><button class="btn btn-primary mb-2 rounded"><i class="bi bi-grid-fill"></i> Back to lessons</button></a>

            <div class="pb-3 border shadow bg-white rounded">

                <div>
                    <h1 class="pt-3 pb-1 ms-4"><?php echo $row['title']; ?></h1>
                </div>
                <hr class="border border-3 border-primary">
                <div>
                    <?php
                    if ($row['file'] != null) {
                        $file = $row['file'];

                        $mime_type = mime_content_type($file);
                        if (strpos($mime_type, 'video') !== false) {
                            echo '<video width="400" style="width: 100%;" controls>
              <source src="' . $row['file'] . '" type="video/mp4">
              Your browser does not support HTML video.
              </video>
              <div class="d-flex align-items-center my-2">
              <p class="text-dark ms-4">Download the video:</p>
              <a class="btn btn-success ms-2 mb-3" href="' . $row['file'] . '" download>Download</a>
              </div>
              ';
                        } elseif (strpos($mime_type, 'image') !== false) {
                            echo '<img src="' . $row['file'] . '" style=" width: 100%;">';
                        } else {
                            echo '<div class="ms-md-5 ms-3">
                    <h1 class="fileIcon"><i class="bi bi-box-seam-fill"></i></h1>
                    <h5>This lesson contain a file.</h5>
                    </div>
                    <div class="d-flex align-items-center mt-4 mb-2">
                    <p class="text-dark ms-4">Download the file:</p>
                    <a class="btn btn-success ms-2 mb-3" href="' . $row['file'] . '" download>Download </a>   
                    </div>
                    
                   ';
                        }
                        echo '<hr class="border border-3 border-primary">';
                    }
                    ?>
                </div>
                <p class="text-dark px-4 py-3"><?php echo nl2br($row['content']); ?></p>
            </div>
        </div>
    </div>
</div>



<?php include("layout/classfooter.php") ?>