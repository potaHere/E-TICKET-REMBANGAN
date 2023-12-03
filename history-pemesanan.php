<?php
include('koneksiDB.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM tiket WHERE email = '$email' AND (status_tiket = 'expired' OR status_tiket = 'sudah di scan') ORDER BY waktu_transaksi DESC";
$result = $con->query($sql);
?>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>History Pembelian</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <!-- <th style="text-align: center;">Id</th> -->
                    <!-- <th>Email</th> -->
                    <th>Tanggal Masuk</th>
                    <!-- <th>Jumlah Dewasa</th> -->
                    <!-- <th>Jumlah Anak-anak</th> -->
                    <!-- <th>Kendaraan</th> -->
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Gunakan loop while untuk mengambil setiap baris hasil
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        // echo '<td style="text-align: center;">' . $row['id_tiket'] . "</td>";
                        echo "<td>" . $row['tanggal_masuk'] . "</td>";
                        echo "<td>" . $row['total_harga'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'><h3>Tidak ada riwayat pembelian tiket</h3></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>