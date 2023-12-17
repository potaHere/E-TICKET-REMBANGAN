<?php
require ('koneksiDB.php');

//total transaksi
$query = "SELECT id_tiket FROM tiket";
$result = $con->query($query);

$jumlah_tiket = $result->num_rows;


//total pengunjung
$query = "SELECT jumlah_dewasa, jumlah_anak FROM tiket WHERE status_tiket = 'sudah di scan'";
$result = $con->query($query);

$total_dewasa = 0;
$total_anak = 0;

while($row = $result->fetch_assoc()) {
    $total_dewasa += $row['jumlah_dewasa'];
    $total_anak += $row['jumlah_anak'];
}


//total penjualan
$query = "SELECT total_harga FROM tiket WHERE status_pembayaran = 'Telah Dibayar'";
$result = $con->query($query);

$total_penjualan = 0;
while($row = $result->fetch_assoc()) {
    $total_penjualan += $row['total_harga'];
}
$total_penjualan_idr = "Rp" . number_format($total_penjualan, 2, ',', '.');


// chart pendapatan perbulan
$query = "SELECT MONTH(tanggal_masuk) as bulan, YEAR(tanggal_masuk) as tahun, SUM(total_harga) as total 
          FROM tiket 
          WHERE YEAR(tanggal_masuk) = YEAR(CURDATE()) 
          GROUP BY MONTH(tanggal_masuk), YEAR(tanggal_masuk) 
          ORDER BY tahun, bulan";
$result = $con->query($query);

// Ubah hasil query menjadi array.
$labels = [];
$data = [];
while ($row = $result->fetch_assoc()) {
    $monthName = date('F', mktime(0, 0, 0, $row['bulan'], 10)); // Ubah nomor bulan menjadi nama bulan
    $labels[] = $monthName;
    $data[] = $row['total'];
}


// chart pengunjung perbulan
$query = "SELECT MONTH(tanggal_masuk) as bulan, YEAR(tanggal_masuk) as tahun, SUM(jumlah_dewasa) as dewasa, SUM(jumlah_anak) as anak 
          FROM tiket 
          WHERE YEAR(tanggal_masuk) = YEAR(CURDATE())  
          GROUP BY MONTH(tanggal_masuk), YEAR(tanggal_masuk) 
          ORDER BY tahun, bulan";
$result = $con->query($query);

// Ubah hasil query menjadi array.
$visitor_labels = [];
$visitor_data = [];
while ($row = $result->fetch_assoc()) {
    $monthName = date('F', mktime(0, 0, 0, $row['bulan'], 10)); // Ubah nomor bulan menjadi nama bulan
    $visitor_labels[] = $monthName;
    $visitor_data[] = $row['dewasa'] + $row['anak']; // Menambahkan jumlah pengunjung dewasa dan anak-anak
}


// chart jumlah kendaraan
$query = "SELECT jenis_kendaraan,SUM(jumlah_kendaraan) as total 
          FROM tiket 
          GROUP BY jenis_kendaraan";
$result = $con->query($query);

// Ubah hasil query menjadi array.
$kendaraan_labels = [];
$kendaraan_data = [];
while ($row = $result->fetch_assoc()) {
    $kendaraan_labels[] = $row['jenis_kendaraan'];
    $kendaraan_data[] = $row['total'];
}
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
	<iframe width="1124" height="700" src="https://app.powerbi.com/view?r=eyJrIjoiNTNjYTE2YjMtMDMyNC00ODFmLWFjMjktMGZjNGY3MjQzOGNkIiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
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
        <div class="card border-0 rounded-4 shadow-sm">
            <canvas id="line" width="700" height="300"></canvas>
        </div>
        <div class="card border-0 rounded-4 shadow-sm">
            <canvas id="donat" width="415" height="300"></canvas>
        </div>
    </div>
    <div class="table-data">
        <div class="card border-0 rounded-4 shadow-sm">
            <canvas id="batang" width="700" height="300"></canvas>
        </div>
        <div class="card border-0 rounded-4 shadow-sm">
            <canvas id="kendaraan" width="415" height="300"></canvas>
        </div>
    </div>
</main>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('line');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Pendapatan Bulanan',
                data: <?php echo json_encode($data); ?>,
                fill: 'origin', // untuk membuat area di bawah garis diisi
                borderColor: 'rgb(50, 87, 168)',
                backgroundColor: 'rgb(152, 170, 211)' // Menambahkan ini
            }]
        },
        options: {
            responsive: false, // Menambahkan ini
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('donat');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Dewasa', 'Anak'],
            datasets: [{
                data: [<?php echo $total_anak ?>, <?php echo $total_dewasa ?>],
                label: 'Pengunjung',
                backgroundColor: [
                    'rgb(50, 87, 168)',
                    'rgb(25, 44, 84)'
                ],
                borderColor: [
                    'rgb(50, 87, 168)',
                    'rgb(25, 44, 84)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainaspectratio: false,
            responsive: false, // Menambahkan ini
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('batang');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($visitor_labels); ?>,
            datasets: [{
                label: 'Pengunjung Bulanan',
                data: <?php echo json_encode($visitor_data); ?>,
                backgroundColor: 'rgb(50, 87, 168)',
                borderColor: 'rgb(50, 87, 168)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, // Menambahkan ini
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('kendaraan');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($kendaraan_labels); ?>,
            datasets: [{
                data: <?php echo json_encode($kendaraan_data); ?>,
                label: 'Jumlah Kendaraan',
                backgroundColor: [
                    'rgb(25, 44, 84)',
                    'rgb(50, 87, 168)',
                    'rgb(152, 170, 211)'
                ],
                borderColor: [
                    'rgb(25, 44, 84)',
                    'rgb(50, 87, 168)',
                    'rgb(152, 170, 211)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainaspectratio: false,
            responsive: false, // Menambahkan ini
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>