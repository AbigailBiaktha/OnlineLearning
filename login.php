<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "layout/loginNavbar.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php include("logic/auth/loginuser.php") ?>

                <h2 class="text-center mb-4">Login</h2>

                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" name="login" class="btn btn-primary btn-lg w-75" style="background-color: #3368C6; border-color: #3368C6;">
                            Login
                        </button>
                    </div>


                </form>
                <div class="text-center">
                    <p>Not registered yet <a href="registration.php">Register Here</a></p>
                </div>
            </div>
        </div>
    </div>


</body>

</html>