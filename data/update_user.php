
<body>
<?php include("logic/auth/usermanage.php"); ?>
    <div class="container text-center">
        <?php if ($user) : ?>
            <form method="post" action="updateuser.php" class="w-50 mx-auto mt-5">
                <input type="hidden" name="userId" value="<?= $user['id']; ?>">

                <div class="mb-3">
                    <label for="newFullName" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" name="newFullName" value="<?= $user['full_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="newEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="newEmail" value="<?= $user['email']; ?>" required>
                </div>

                <button type="submit" name="updateUser" class="btn btn-primary btn-lg w-100" style="background-color:#2F4F4Fff; border-color: #2F4F4Fff;">Update User</button>
            </form>
        <?php else : ?>
            <p>User not found.</p>
        <?php endif; ?>

    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
