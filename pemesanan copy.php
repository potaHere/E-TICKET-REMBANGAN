<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Poppins:300);

        body {
            background-image: url('../picture/rembangann.jpg');
            font-family: "Poppins", sans-serif;
            padding-top: 5rem;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            font-family: inherit;
            font-size: inherit;
            color: #333333;
            border: none;
            outline: none;
            border-radius: 2px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.24);
        }

        .btn {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.24);
            border-radius: 0px;
        }

        .form-group {
            margin-bottom: 1rem;
            font-family: "Poppins", sans-serif;
            font-size: larger;
        }

        div.col-md-8 {
            margin-top: 5rem;
        }

        .container .card {
            background: #fff;
            padding: 30px 35px;
            border-radius: 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            max-width: 600px;
        }

        .container .card form .form-control {
            height: 40px;
            font-size: 15px;
        }

        .container .card form button {
            background: rgb(74, 143, 83);
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .container .card form button:hover {
            background: rgb(95, 149, 102);
        }

        .container .card form .link {
            padding: 5px 0;
        }

        .container .card form .message a {
            color: rgb(74, 143, 83);
        }

        .container .login-form form p {
            font-size: 14px;
        }

        .row {
            /* margin-top: 2rem; */
            align-items: center;
            justify-content: center;
        }
    </style>

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
                            <a class="nav-link text-danger" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-8"> -->
            <!-- FORM TIKET -->
            <div class="card ">
                <h1 class="text-center"><i class="bi bi-ticket-detailed">TIKET</i></h1>
                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <p><?php echo $_SESSION['status']; ?></p>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <form action="pemesanan-code.php" method="POST" id="pemesananForm">
                    <div class="form-group mb-3">
                        <div class="">
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="mid" for="nama">
                                        <h4>Nama :</h4>
                                    </label>
                                    <input type="text" name="nama" class="form-control" placeholder="">
                                    <input type="hidden" name="email" class="form-control" placeholder="" value="<?php echo $email; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row text-center">
                            <div class="col mb-3">
                                <label for="tgl_masuk">
                                    <h4>Tanggal Masuk</h4>
                                </label>
                                <input type="date" name="tgl_masuk" class="form-control" placeholder="" min="<?php echo $today; ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb3 text-center">
                        <label for="nama">
                            <h4>Jumlah Tiket</h4>
                        </label>
                    </div>
                    <div class="form-group mb-3">

                        <div class="row text-center">
                            <div class="col">
                                <label for="dewasa">Dewasa</label>
                                <input type="number" name="dewasa" class="form-control" placeholder="" min="0">
                            </div>
                            <div class="col">
                                <label for="anak">Anak-anak</label>
                                <input type="number" name="anak" class="form-control" placeholder="0" min="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-3"></div>
                    <div class="input-group mb-3">
                        <select name="kendaraan" class="btn btn-outline-success dropdown-toggle kendaraan-button" id="dropdownMenuButton">
                            <option value="">Pilih Kendaraan</option>
                            <option value="motor">Motor</option>
                            <option value="mobil">Mobil</option>
                            <option value="truk&bus">Truk & Bus</option>
                        </select>
                        <input type="number" name="kendaraan_qty" class="form-control" min="0" placeholder="Masukkan Jumlah Kendaraan">
                    </div>
                    <div class="form-group row">
                        <label>Total Harga: </label>
                        <input type="text" name="total_harga" id="totalPrice" class="form-control" value="Rp 0" readonly style="border: none; pointer-events: none;">
                        <input type="hidden" name="total_harga_int" id="totalPrice_int" class="form-control" value="" readonly style="border: none; pointer-events: none;">
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="pemesanan_btn" class="btn btn-success">Pilih Metode Pembayaran</button>
                    </div>
                </form>
            </div>
            <!-- FORM TIKET -->
            <!-- </div> -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/pemesanan.js"></script>
</body>