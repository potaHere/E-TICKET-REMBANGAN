<?php
include('koneksiDB.php');

// Buat query SQL untuk meng-update status tiket
$sql = "UPDATE tiket SET status_tiket = 'expired' WHERE status_tiket = 'aktif' AND tanggal_masuk < CURDATE()";
$query_run = mysqli_query($con, $sql);


$con->close();
?>

<?php
// Query untuk mengambil ID dari database
$sql = "SELECT id_tiket FROM tiket WHERE status_tiket = 'sudah di scan' OR tanggal_masuk < CURDATE()";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
    $filename = 'qrcodes/' . $row['id_tiket'] . '.png';

    if (file_exists($filename)) {
        unlink($filename);
    }
}
?>