<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wisata Rembangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/pmsn.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

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
                    <!-- <div class="form-group mb-3">
                                    <p>
                                        Pembelian tiket dapat dilakukan secara online maupun offline. Pembelian tiket secara online dapat dilakukan melalui website ini. Pembelian tiket secara offline dapat dilakukan di loket-loket yang tersedia di lokasi wisata.
                                    </p>
                                </div> -->
                    <div class="card ">
                        <h1 class="text-center"><i class="bi bi-ticket-detailed">TIKET</i></h1>
                        
                            <form action="pemesanan-code.php" method="POST">
                                <div class="form-group mb-3">
                                   
                                        <div class="row text-center">
                                            <div class="col mb-3">
                                                <label for="tgl_masuk"><h4>Tanggal Masuk</h4></label>
                                                <input type="date" name="tgl_masuk" class="form-control" placeholder="">
                                            </div>
                                            <!-- <div class="col mb-3">
                                                <label class="mid" for="tgl_keluar">Tanggal Keluar</label>
                                                <input type="date" name="tgl_keluar" class="form-control" placeholder="">
                                            </div> -->
                                        </div>
                                    
                                </div>
                                <div class="form-group mb3 text-center">
                                    <label for="nama"><h4>Jumlah Tiket</h4></label>
                                </div>
                                <div class="form-group mb-3">
                                    
                                        <div class="row text-center">
                                            <div class="col">
                                                <label for="dewasa">Dewasa</label>
                                                <input type="number" name="dewasa" class="form-control" placeholder="1">
                                            </div>
                                            <div class="col">
                                                <label for="anak">Anak-anak</label>
                                                <input type="number" name="anak" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="form-group mb-3"></div>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-outline-success dropdown-toggle kendaraan-button" type="button" data-bs-toggle="dropdown" id="dropdownMenuButton">Kendaraan</button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item">Motor</a></li>
                                            <li><a class="dropdown-item">Mobil</a></li>
                                            <li><a class="dropdown-item">Mini Bus</a></li>
                                        </ul>
                                        <input type="number" class="form-control">
                                    </div>
                                    <script>
                                        // Add click event listener to dropdown items
                                        document.querySelectorAll('.dropdown-menu a').forEach(item => {
                                            item.addEventListener('click', event => {
                                                // Change button text to selected item's text
                                                document.getElementById('dropdownMenuButton').innerText = event.target.innerText;
                                            });
                                        });
                                    </script>
                                <div class="form-group row">
                                    <label>Total Harga: </label>
                                    <span id="totalPrice">0</span>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" name="pemesanan_btn" class="btn btn-success">Pilih Metode Pembayaran</button>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>