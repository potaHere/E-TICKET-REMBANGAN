<?php
include ('koneksiDB.php');

// Query untuk mengambil ID dari database
$sql = "SELECT id_tiket FROM tiket WHERE id_tiket = ".$_SESSION['id_tiket']." AND (status_tiket = 'sudah di scan' OR tanggal_masuk < CURDATE())";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
    $filename = 'qrcodes/' . $row['id_tiket'] . '.png';

    if (file_exists($filename)) {
        unlink($filename);
    }
}
?>