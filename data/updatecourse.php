
<body>
    <?php
     include("logic/class/getclass.php") ;
     include("logic/class/updateclass.php") ;

    if (isset($_POST['updateBtn'])) {

        
        header("Location: admincourseview.php");
        exit();
    }
   ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>

        <table class="table">
            <tbody>
                <tr>
                    <td><label for="">Name of class</label></td>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                </tr>

                <tr>
                    <td><label for="">Image</label></td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td><label for="">Description</label></td>
                    <td><textarea name="description" id="" cols="30" rows="10"><?php echo $row['description']; ?></textarea></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
                    </td>
            
                </tr>
            </tbody>
        </table>
    </form>

</body>

</html>
