<?php
include ('koneksiDB.php');
$sql = "SELECT `id_tiket`, `nama`, `email`, `tanggal_masuk`, `jumlah_dewasa`, `jumlah_anak`, `jenis_kendaraan`, `jumlah_kendaraan`, `total_harga`, `status_pembayaran`, `waktu_transaksi`, `status_tiket` FROM `tiket`";
$result = $con->query($sql);
?>

<main>
    <div class="head-title">
            <div class="left">
                <h1>Tabel Tiket</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Tabel Tiket</a>
                    </li>
                    <!-- <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li> -->
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
    </div>
    <!-- <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
                    <h3>1020</h3>
                    <p>New Order</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
                    <h3>2834</h3>
                    <p>Visitors</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
                    <h3>$2543</h3>
                    <p>Total Sales</p>
                </span>
            </li>
    </ul> -->
    <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <!-- <i class='bx bx-search' ></i> -->
                    <!-- <i class='bx bx-filter' ></i> -->
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID Tiket</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Dewasa</th>
                            <th>Jumlah Anak</th>
                            <th>Jenis Kendaraan</th>
                            <th>Jumlah Kendaraan</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                            <th>Waktu Transaksi</th>
                            <th>Status Tiket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Gunakan loop while untuk mengambil setiap baris hasil
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_tiket'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['tanggal_masuk'] . "</td>";
                            echo "<td>" . $row['jumlah_dewasa'] . "</td>";
                            echo "<td>" . $row['jumlah_anak'] . "</td>";
                            echo "<td>" . $row['jenis_kendaraan'] . "</td>";
                            echo "<td>" . $row['jumlah_kendaraan'] . "</td>";
                            echo "<td>" . $row['total_harga'] . "</td>";
                            echo "<td>" . $row['status_pembayaran'] . "</td>";
                            echo "<td>" . $row['waktu_transaksi'] . "</td>";
                            echo "<td>" . $row['status_tiket'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Sales Report</h3>
                        <div class="menu">
                                <i class="bx bx-dots-horizontal-rounded"></i>
                                <ul class="menu-link">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Save</a></li>
                                    <li><a href="#">Remove</a></li>
                                    </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <div id="chart"></div>
                    </div>
                </div>
            </div> -->
    </div>
</main>