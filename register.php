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
    <div class="py-5" style="width: 800px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 login-form">
                    <div class="alert">
                    </div>
                    <div class="card">
                        <h1 class="text-center"><i class="bi bi-plus-square"> Sign Up</i></h1>
                        
                            <?php
                                if (isset($_SESSION['status'])) {
                                    ?>
                                    <div class="alert alert-success">
                                        <h4><?php echo $_SESSION['status']; ?></h4>
                                    </div>
                                    <?php
                                    unset($_SESSION['status']);
                                }
                            ?>
                            <form action="code.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Isikan Nama Lengkap">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telp">No HP</label>
                                    <input type="text" name="telp" class="form-control" placeholder="Isikan Nomer Telepon">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="passowrd">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Isikan Password">
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div> -->
                                <div class="form-group row">
                                    <p class="message">Sudah Punya Akun? <a href="login.php">Masuk Disini!</a></p>
                                    <button type="submit" name="register_btn" class="btn btn-success">Daftar</button>
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