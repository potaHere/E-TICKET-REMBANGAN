<?php
include('phpqrcode/qrlib.php'); 

include ('koneksiDB.php');

// Membuat direktori jika belum ada
if (!file_exists('qrcodes')) {
    mkdir('qrcodes', 0777, true);
}
// Query untuk mengambil ID dari database
$sql = "SELECT id_tiket FROM tiket WHERE id_tiket = '$idPemesanan' AND status_tiket = 'aktif'";
$result = $con->query($sql);

while($row = $result->fetch_assoc()) {
    // Membuat QR Code dari ID
    $id_tiket = 'qrcodes/'.$row['id_tiket'].'.png';
    QRcode::png($row['id_tiket'], $id_tiket, 'H', 5, 2);
    // echo '<img src="'.$id_tiket.'" /><br>';
}
?>