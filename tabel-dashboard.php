<?php
include ('koneksiDB.php');
$sql = "SELECT `id_tiket`, `nama`, `email`, `tanggal_masuk`, `jumlah_dewasa`, `jumlah_anak`, `jenis_kendaraan`, `jumlah_kendaraan`, `total_harga`, `status_pembayaran`, `waktu_transaksi`, `status_tiket` FROM `tiket` ORDER BY `tiket`.`waktu_transaksi` DESC";
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
                </ul>
            </div>
    <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
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

<script>
document.addEventListener("DOMContentLoaded", function () {
  var searchInput = document.getElementById("search-input1");
  var tableRows = document.querySelectorAll("tbody tr"); // Ganti dengan selektor yang sesuai

  searchInput.addEventListener("input", function () {
    var searchValue = searchInput.value.toLowerCase();

    tableRows.forEach(function (row) {
      var rowText = row.textContent.toLowerCase();

      if (rowText.includes(searchValue)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});
</script>