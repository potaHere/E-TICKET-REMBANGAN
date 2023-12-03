<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit(0);
}

// Cek apakah pengguna adalah admin
if ($_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit(0);
}

$today = date("Y-m-d");
$email = $_SESSION['email'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata Rembangan</title>
    <link rel="shortcut icon" href="picture/img/logo/logo-rembangan.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pemesanan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar bg-success bg-opacity-65 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1 text-white" href="#">Wisata Rembangan</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h1 class="offcanvas-title mb-0" id="offcanvasNavbarLabel">Wisata Rembangan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-3 pe-3">
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="pemesanan.php?page=main-pemesanan">Home</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="pemesanan.php?page=tiket-pemesanan">Tiket</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="pemesanan.php?page=history-pemesanan">History</a>
                        </li>
                        <li class="nav-item mb-3 text-center">
                            <a class="nav-link text-danger" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'main-pemesanan.php':
                include 'main-pemesanan.php';
                break;
            case 'tiket-pemesanan':
                include 'tiket-pemesanan.php';
                break;
            case 'history-pemesanan':
                include 'history-pemesanan.php';
                break;
            default:
                include 'main-pemesanan.php'; // Halaman default jika parameter tidak sesuai
                break;
        }
    } else {
        include 'main-pemesanan.php'; // Halaman default jika parameter tidak ada
    }
    ?>

    <!-- <script>
        window.visibilitychange = function() {
            navigator.sendBeacon('logout.php');
        };
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/pemesanan.js"></script>
</body>