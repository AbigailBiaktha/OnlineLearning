<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>G-Path</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>123 Street, Yangon City, Myanmar</small>

                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Brand Start -->
    <div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-telephone-inbound fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Call Now</h5>
                        <span>09 1234 5678</span>
                    </div>
                </div>
                <a href="index.php" class="h1 text-white mb-0">G<span class="text-dark">-Path</span></a>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Mail Now</h5>
                        <span>gpath@edu.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
                <a href="index.html" class="navbar-brand d-lg-none">
                    <h1 class="text-primary m-0">G<span class="text-dark">-Path</span></h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">Home</a>

                        <a href="contact.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">Contact</a>

                        <a href="classes.php" class="nav-item nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'classes.php') ? 'active' : ''; ?>">Courses</a>
                    </div>
                    <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                        <div class="ms-auto d-none d-lg-flex">
                            <a class="m-2" href="registration.php">Register</a>
                            <a class="btn btn-primary rounded-pill ms-2 px-4" href="login.php">Login</a>
                        </div>
                    <?php } else { ?>
                        <div class="ms-auto d-none d-lg-flex">
                            <a class="btn btn-danger rounded-pill ms-2 px-4" onclick="confirmLogout()">Logout</a>
                        </div>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </div>

    <script>
        function confirmLogout() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                // If the user clicks "OK" in the confirmation dialog, proceed with the logout
                window.location.href = "logout.php";
            } else {
                // If the user clicks "Cancel" in the confirmation dialog, do nothing (or handle it as needed)
            }
        }
    </script>