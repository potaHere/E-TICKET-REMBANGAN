<div class="container">
        <div class="row">
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
                                    <input type="text" name="email" class="form-control" placeholder="" readonly value="<?php echo $email; ?>">
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
                                <input type="number" name="dewasa" class="form-control" placeholder="0" min="0">
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