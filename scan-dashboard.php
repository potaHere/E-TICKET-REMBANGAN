<?php
if (isset($_POST['enter'])) {
    updateFunction();
}
function updateFunction() {
    // Check if $_SESSION['id_tiket'] is null
    if (empty($_SESSION['id_tiket'])) {
        echo "<script type='text/javascript'>alert('Masukkan data terlebih dahulu');</script>";
        exit(0);
    }
    else{
        include ('koneksiDB.php');
        // SQL query to update table
        $query = "UPDATE tiket SET status_tiket = 'sudah di scan' WHERE id_tiket = '".$_SESSION['id_tiket']."'";
        $query_run = mysqli_query($con, $query);

        (include 'hapus_qrCode.php');

        if (($query_run) > 0) {
            echo "<script type='text/javascript'>alert('Berhasil mengupdate data');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Gagal mengupdate data');</script>";
        }
    }
    // Kosongkan session id_tiket setelah fungsi dijalankan
    unset($_SESSION['id_tiket']);
}

function searchFunction($query)
{
    include ('koneksiDB.php');
    $query = "SELECT id_tiket, nama, jumlah_dewasa, jumlah_anak, jenis_kendaraan, jumlah_kendaraan FROM tiket WHERE id_tiket = '$query' AND status_tiket = 'aktif' AND tanggal_masuk = CURDATE()";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
            $_SESSION['id_tiket'] = $row['id_tiket'];
            echo "<tr>";
            echo "<td>" . $row['id_tiket'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['jumlah_dewasa'] . "</td>";
            echo "<td>" . $row['jumlah_anak'] . "</td>";
            echo "<td>" . $row['jenis_kendaraan'] . "</td>";
            echo "<td>" . $row['jumlah_kendaraan'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td>Tiket tidak ditemukan</td>";
        echo "<td></td>";
        echo "</tr>";
    }
}
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
    <form action="dashboard.php?page=scan-dashboard" method="POST">
        <div class="form-input put">
            <input type="text" name="query" placeholder="Search..." autofocus>
            <button type="submit" name="search" class="search-btn"><i class="bx bx-search"></i></button>
        </div>
    </form>
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
                    if (isset($_POST['search'])) {
                        searchFunction($_POST['query']);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <style>
    body main form div button#enter {
        position: absolute;
        right: 2rem;
        border-radius: 50px;
        padding: 15px 30px; /* Increase padding to make the button bigger */
        font-size: 20px; /* Increase font size */
        background-color: red;
        border: none;
        color: white;
        transition: all 0.3s ease;
        margin-top: 2rem;
    }

    body main form div button#enter:hover {
        background-color: darkred;
        cursor: pointer;
    }
    </style>

    <form action="dashboard.php?page=scan-dashboard" method="POST">
        <div class="form-input">
            <button type="submit" name="enter" id="enter">Submit</button>
        </div>
    </form>
</main>