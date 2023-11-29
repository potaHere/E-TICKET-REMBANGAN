<?php 
session_start();
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wisata Rembangan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pemesanan.php">Pemesanan Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tiket.php">Tiket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history.php">History Tiket</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <?php
        // include('includes/header.php'); 
        // include('side-bar.php');
    ?>
    <div class="py-5" style="width: 800px;">
        <div class="container">
            <div class="row" style="align-items:center; justify-content:center;">
                <div class="col-md-8">
                    <?php
                        if (isset($_SESSION['status'])) 
                        {
                            ?>
                            <div class="alert alert-success">
                                <p><?php echo $_SESSION['status']; ?></p>
                            </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                    <!-- FORM TIKET -->
                    <div class="card ">
                        <h1 class="text-center"><i class="bi bi-ticket-detailed">TIKET</i></h1>
                            <form action="pemesanan-code.php" method="POST" id="pemesananForm">
                                <div class="form-group mb-3">
                                    <div class="">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label class="mid" for="nama"><h4>Nama :</h4></label>
                                                <input type="text" name="nama" class="form-control" placeholder="">
                                                <input type="hidden" name="email" class="form-control" placeholder="" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                        <div class="row text-center">
                                            <div class="col mb-3">
                                                <label for="tgl_masuk"><h4>Tanggal Masuk</h4></label>
                                                <input type="date" name="tgl_masuk" class="form-control" placeholder="" min="<?php echo $today; ?>">
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="form-group mb3 text-center">
                                    <label for="nama"><h4>Jumlah Tiket</h4></label>
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
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/pemesanan.js"></script>
</body>