<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata Rembangan</title>
    <link rel="shortcut icon" href="picture/img/logo/logo-rembangan.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- <img src="picture/rembangann.jpg" alt=""> -->
    <div class="py-5" style="width: 800px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 login-form">
                    <div class="card">
                    <h1 class="text-center"><i class="bi bi-door-open"> Log In</i></h1>
                            <?php
                                if (isset($_SESSION['status'])) 
                                {
                                    ?>
                                    <div class="alert alert-success">
                                        <h4><?php echo $_SESSION['status']; ?></h4>
                                    </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <form action="logincode.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Isikan Email anda">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="passowrd">Passowrd</label>
                                    <input type="password" name="passowrd" class="form-control" placeholder="Isikan Password anda">
                                </div>
                                <div class="form-group row">
                                    <p class="message"><a href="password-reset.php" class="float-end">Lupa Password?</a></p>
                                    <p class="message">Belum Punya Akun? <a href="register.php">Daftar Disini!</a></p>
                                    <button type="submit" name="login_now_btn" class="btn btn-success">Login</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>