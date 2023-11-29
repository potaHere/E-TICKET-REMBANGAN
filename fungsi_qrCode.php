<?php
include('phpqrcode/qrlib.php'); 

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'rembangan_db');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Membuat direktori jika belum ada
if (!file_exists('qrcodes')) {
    mkdir('qrcodes', 0777, true);
}

// Query untuk mengambil ID dari database
$sql = "SELECT id_tiket FROM tiket";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    // Membuat QR Code dari ID
    $id_tiket = 'qrcodes/'.$row['id_tiket'].'.png';
    QRcode::png($row['id_tiket'], $id_tiket);
    echo '<img src="'.$id_tiket.'" /><br>';
}

$conn->close();
?>