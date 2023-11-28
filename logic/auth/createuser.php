<?php


if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $errors = array();

    if (empty($fullName) or empty($email) or empty($password) or empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed");
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }
        mysqli_stmt_close($stmt);
    }
    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $defaultPrivilegeLevel = 0;
        $sql = "INSERT INTO users (full_name, email, password, PrivilegeLevel) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die("SQL statement failed");
        } else {
            mysqli_stmt_bind_param($stmt, "sssi", $fullName, $email, $passwordHash, $defaultPrivilegeLevel);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
            mysqli_stmt_close($stmt);
        }
    }
}
