<?php
require_once(__DIR__ . "/../connect.php");


// Function to fetch all users from the database
function fetchAllUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        // Handle query error
        die("Error fetching users: " . mysqli_error($conn));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Function to update user data
function updateUserData($conn, $userId, $newFullName, $newEmail, $newPrivilege) {
    $updateSql = "UPDATE users SET full_name = ?, email = ?, PrivilegeLevel = ? WHERE id = ?";
    $updateStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "ssii", $newFullName, $newEmail, $newPrivilege, $userId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
        header("Location: admin_view.php");
        exit();
    } else {
        // Handle prepared statement error
        die("Update statement preparation error: " . mysqli_error($conn));
    }
}

// Function to delete user data
function deleteUserData($conn, $userIdToDelete) {
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $deleteStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
        mysqli_stmt_bind_param($deleteStmt, "i", $userIdToDelete);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);

    } else {
        // Handle prepared statement error
        die("Delete statement preparation error: " . mysqli_error($conn));
    }
}

// Handle user updates
if (isset($_POST["updateUser"])) {
    $userId = $_POST["userId"];
    $newFullName = $_POST["newFullName"];
    $newEmail = $_POST["newEmail"];
    $newPrivilege = $_POST["newPrivilege"];

    updateUserData($conn, $userId, $newFullName, $newEmail, $newPrivilege);
}

// Handle user deletion
if (isset($_POST["deleteUser"])) {
    $userIdToDelete = $_POST["userIdToDelete"];
    deleteUserData($conn, $userIdToDelete);
}

// Fetch users
$users = fetchAllUsers($conn);

// Function to get user data by ID
function getUserById($conn, $userId) {
    // Your SQL query to fetch user data by ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
    }

    return null;
}

// Fetch the user ID from the URL
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;

// Fetch the user data
$user = getUserById($conn, $userId);

?>
