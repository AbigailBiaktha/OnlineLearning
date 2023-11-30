<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "layout/loginNavbar.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php include('logic/auth/createuser.php') ?>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Register</h2>

                <form action="registration.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password" required>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg w-75" style="background-color: #3368C6; border-color: #3368C6">
                            Register
                        </button>
                    </div>
                </form>

                <div class="text-center">
                    <p>Already Registered? <a href="login.php">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>