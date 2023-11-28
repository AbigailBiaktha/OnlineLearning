<?php
session_start();
require_once "connection.php";


// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle user updates
if (isset($_POST["updateUser"])) {
    $userId = $_POST["userId"];
    $newFullName = $_POST["newFullName"];
    $newEmail = $_POST["newEmail"];
    $newPrivilege = $_POST["newPrivilege"];

    $updateSql = "UPDATE users SET full_name = ?, email = ?, PrivilegeLevel = ? WHERE id = ?";
    $updateStmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "ssii", $newFullName, $newEmail, $newPrivilege, $userId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
    }
}

// Handle user deletion
if (isset($_POST["deleteUser"])) {
    $userIdToDelete = $_POST["userIdToDelete"];

    $deleteSql = "DELETE FROM users WHERE id = ?";
    $deleteStmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
        mysqli_stmt_bind_param($deleteStmt, "i", $userIdToDelete);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);
    }
}

// Fetch users again after update or delete
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Admin Panel</h1>
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
                    <tr>
                        <td><?php echo $user["id"]; ?></td>
                        <td><?php echo $user["full_name"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td><?php echo $user["PrivilegeLevel"]; ?></td>
                        <td>
                            <form method="post" action="admin_user.php">
                                <input type="hidden" name="userId" value="<?php echo $user["id"]; ?>">
                                <div class="mb-3">
                                    <label for="newFullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="newFullName" value="<?php echo $user["full_name"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="newEmail" value="<?php echo $user["email"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPrivilege" class="form-label">Select New Privilege</label>
                                    <select class="form-select" name="newPrivilege" id="newPrivilege">
                                        <option value="0" <?php echo ($user["PrivilegeLevel"] == 0) ? "selected" : ""; ?>>User</option>
                                        <option value="1" <?php echo ($user["PrivilegeLevel"] == 1) ? "selected" : ""; ?>>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" name="updateUser" class="btn btn-primary">Update User</button>
                            </form>

                            <form method="post" action="admin_user.php" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                <input type="hidden" name="userIdToDelete" value="<?php echo $user["id"]; ?>">
                                <button type="submit" name="deleteUser" class="btn btn-danger">Delete User</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-dNlA6gPjkGOJ6Se4OvEskckOQzXAWGH3go9tD5Stx2txU1CIlgVC5RDI6PxpX8Jr" crossorigin="anonymous"></script>
</body>

</html>
