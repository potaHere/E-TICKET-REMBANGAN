<?php
include('koneksiDB.php');

// Buat query SQL untuk menghapus tiket dengan status_tiket NULL atau kosong
$sql = "DELETE FROM tiket WHERE status_pembayaran IS NULL OR status_tiket = ''";
$query_run = mysqli_query($con, $sql);
?>