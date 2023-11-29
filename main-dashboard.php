<?php
require ('koneksiDB.php');

//total pengunjung
$query = "SELECT id_tiket FROM tiket";
$result = $con->query($query);

$jumlah_tiket = $result->num_rows;


//total pengunjung
$query = "SELECT jumlah_dewasa, jumlah_anak FROM tiket WHERE status_tiket = 3";
$result = $con->query($query);

$total_dewasa = 0;
$total_anak = 0;

while($row = $result->fetch_assoc()) {
    $total_dewasa += $row['jumlah_dewasa'];
    $total_anak += $row['jumlah_anak'];
}


//total penjualan
$query = "SELECT status_pembayaran FROM tiket WHERE status_pembayaran = 'Telah Dibayar'";
$result = $con->query($query);

$total_penjualan = 0;
while($row = $result->fetch_assoc()) {
    $total_penjualan += $row['jumlah_pembayaran'];
}
$total_penjualan_idr = "Rp" . number_format($total_penjualan, 2, ',', '.');

?>

<main>
    <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <!-- <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li> -->
                </ul>
            </div>
            <!-- <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a> -->
    </div>
    <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
                    <h3><?php echo $jumlah_tiket ?></h3>
                    <p>Total Transaksi</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
                    <h3><?php echo $total_anak + $total_dewasa ?></h3>
                    <p>Total Pengunjung</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
                    <h3><?php echo $total_penjualan_idr ?></h3>
                    <p>Total Penjualan</p>
                </span>
            </li>
    </ul>
    <div class="table-data">
        <div class="data">
            <div class="content-data">
                <div class="head">
                    <h3>Sales Report</h3>
                    <!-- <div class="menu">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                                </ul>
                    </div> -->
                </div>
                <div class="chart">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
</main>