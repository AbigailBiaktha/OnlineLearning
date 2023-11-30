<?php
require_once("logic/auth/usermanage.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="css/userlist.css">


</head>

<body>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Privilege Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr id="userRow<?= $user['id']; ?>">
                        <td><?= $user["id"]; ?></td>
                        <td><?= $user["full_name"]; ?></td>
                        <td><?= $user["email"]; ?></td>
                        <td><?= $user["PrivilegeLevel"]; ?></td>
                        <td>
                            <div class="action-buttons">
                            <button type="button" class="btn btn-primary btn-sm">
                               <a href="updateuser.php?userId=<?= $user['id']; ?>" style="color: white; text-decoration: none;">Update</a>
                           </button>
                                <!-- Delete form -->
                                <form method="post" action="admin_view.php" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    <input type="hidden" name="userIdToDelete" value="<?= $user["id"]; ?>">
                                    <button type="submit" name="deleteUser" class="btn btn-danger btn-sm">Delete User</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>