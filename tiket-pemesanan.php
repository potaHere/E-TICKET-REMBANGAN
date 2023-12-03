<?php
include('koneksiDB.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM tiket WHERE email = '$email' AND status_tiket = 'aktif' AND status_pembayaran = 'Telah Dibayar' ORDER BY waktu_transaksi DESC";
$result = $con->query($sql);
?>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Tiket Aktif</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>nama</th>
                    <th>Tanggal Masuk</th>
                    <!-- <th>Tanggal</th> -->
                    <th>QR Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Gunakan loop while untuk mengambil setiap baris hasil
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['tanggal_masuk'] . "</td>";
                        $qrcode_path = "qrcodes/" . $row['id_tiket'] . ".png";
                        echo "<td class="."qrcode"."><img src='$qrcode_path' alt='QR Code'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'><h3>Tidak ada Tiket yang aktif</h3></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>