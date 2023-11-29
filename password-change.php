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
                <div class="col-md-8">
                    <div class="card">
                        <h1 class="text-center"><i class="bi bi-arrow-clockwise"> Ganti Password</i></h1>
                        
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
                            <form action="password-reset-code.php" method="POST">
                                <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                                <div class="form-group mb-3">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control" placeholder="Enter Email Address">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">New Password</label>
                                    <input type="password" name="new_password" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="">
                                </div>
                                <div class="form-group row">
                                    <button type="submit" name="password_update" class="btn btn-success">Update Passowrd</button>
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