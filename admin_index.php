<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Check if the user has admin privileges
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("location: home.php"); // Redirect non-admin users to home.php or another appropriate page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hi heelo </h1>
</body>

</html>
