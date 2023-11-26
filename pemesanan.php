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
    <div class="py-5" style="width: 100%;">
        <div class="container">
            <div class="row" style="align-items:center; justify-content:center;">
                <div class="col-md login-form text-center">
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

                                <div class="">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nama"><h5>Nama</h5></label>
                                                <input type="text" name="nama" class="form-control" placeholder="">
                                                <input type="hidden" name="email" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                    </div>
                                   
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="tgl_masuk"><h5>Tanggal Masuk</h5></label>
                                                <input type="date" name="tgl_masuk" class="form-control" placeholder="">
                                            </div>
                                            <!-- <div class="col mb-3">
                                                <label class="mid" for="tgl_keluar">Tanggal Keluar</label>
                                                <input type="date" name="tgl_keluar" class="form-control" placeholder="">
                                            </div> -->
                                        </div>
                                    
                                </div>
                                <div class="mb3 text-center">
                                    <label for="nama"><h5>Jumlah Tiket</h5></label>
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
                                    <input type="text" name="total_harga" id="totalPrice" class="form-control" value="Rp 0" readonly style="border: none; pointer-events: none;">
                                    <input type="hidden" name="total_harga_int" id="totalPrice_int" class="form-control" value="" readonly style="border: none; pointer-events: none;">
                                </div>
                                <div class="form-group row">
                                    <button type="button" name="pilih_pembayaran" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pilih Metode Pembayaran</button>
                                
                                     <!-- Modal -->
                                     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Metode Pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row"><h5>Transfer Virtual Account</h5>
                                                <div class="col">
                                                    <!-- Add unique IDs to your buttons -->
                                                    <button type="button" id="bank-bri" class="payment-button"><img src="img/bank-bri.png" alt="Bank BRI" width="100px"></button>
                                                    <button type="button" id="bank-bni" class="payment-button"><img src="img/bank-bni.png" alt="Bank BNI" width="100px"></button>
                                                    <button type="button" id="bank-bca" class="payment-button"><img src="img/bank-bca.png" alt="Bank BCA" width="100px"></button>

                                                    <!-- Add a hidden input field to store the selected item -->
                                                    <input type="hidden" id="selected-payment-method" name="selected_payment_method">
                                                </div>
                                            </div>
                                            <div class="row"><h5>E Money</h5>
                                                <div class="col">
                                                    <button type="button"><img src="img/bank-bri.png" alt="Bank BRI" width="100px"></button>
                                                    <button type="button"><img src="img/bank-bni.png" alt="Bank BNI" width="100px"></button>
                                                    <button type="button"><img src="img/bank-bca.png" alt="Bank BCA" width="100px"></button>
                                                </div>
                                            </div>
                                            <div class="row"><h5>MiniMarket/Outlet</h5>
                                                <div class="col">
                                                    <button type="button"><img src="img/bank-bri.png" alt="Bank BRI" width="100px"></button>
                                                    <button type="button"><img src="img/bank-bni.png" alt="Bank BNI" width="100px"></button>
                                                    <button type="button"><img src="img/bank-bca.png" alt="Bank BCA" width="100px"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="pemesanan_btn" class="btn btn-success">Bayar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/pemesanan.js"></script>
    
</body>