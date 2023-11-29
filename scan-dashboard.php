<?php 
$sql = "SELECT `id_tiket` as 'ID Pesanan', `nama`, `jumlah_dewasa` as 'Jumlah Dewasa', `jumlah_anak` as 'Jumlah Anak', `jenis_kendaraan` as 'Jenis Kendaraan', `jumlah_kendaraan` as 'Jumlah Kendaraan' FROM `tiket`";
$result = $con->query($sql);
?>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Scan TIket</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Scan Tiket</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
                    <div class="head">
                        <h3>Scan Masuk</h3>
                        <!-- <i class='bx bx-search' ></i> -->
                        <!-- <i class='bx bx-filter' ></i> -->
                    </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama</th>
                        <th>Jumlah Dewasa</th>
                        <th>Jumlah Anak</th>
                        <th>Jenis Kendaraan</th>
                        <th>Jumlah Kendaraan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Gunakan loop while untuk mengambil setiap baris hasil
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ID Pesanan'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['Jumlah Dewasa'] . "</td>";
                        echo "<td>" . $row['Jumlah Anak'] . "</td>";
                        echo "<td>" . $row['Jenis Kendaraan'] . "</td>";
                        echo "<td>" . $row['Jumlah Kendaraan'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>