<?php
require_once(__DIR__ . "/../connect.php");

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if it's the admin credentials
    $adminSql = "SELECT * FROM users WHERE email = ? AND PrivilegeLevel = 1";
    $stmtAdmin = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmtAdmin, $adminSql)) {
        mysqli_stmt_bind_param($stmtAdmin, "s", $email);
        mysqli_stmt_execute($stmtAdmin);
        $adminResult = mysqli_stmt_get_result($stmtAdmin);
        $admin = mysqli_fetch_assoc($adminResult);

        mysqli_stmt_close($stmtAdmin);

        if ($admin && password_verify($password, $admin["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["admin"] = true;
            $_SESSION["loggedin"] = true; // Set the session variable for logged-in status
            header("Location: admin_index.php");
            die();
        }
    }

    // If not admin, check for regular user
    $userSql = "SELECT * FROM users WHERE email = ? AND PrivilegeLevel = 0";
    $stmtUser = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmtUser, $userSql)) {
        mysqli_stmt_bind_param($stmtUser, "s", $email);
        mysqli_stmt_execute($stmtUser);
        $userResult = mysqli_stmt_get_result($stmtUser);
        $user = mysqli_fetch_assoc($userResult);

        mysqli_stmt_close($stmtUser);

        if ($user && password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["admin"] = false;
            $_SESSION["loggedin"] = true; // Set the session variable for logged-in status
            header("Location: index.php");
            die();
        }
    }

    // If neither admin nor regular user, display an error message
    echo "<div class='alert alert-danger'>Invalid login credentials</div>";
}
