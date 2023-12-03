<?php
session_start();
include('../koneksiDB.php');

$_SESSION['status'] = "Pembelian gagal,";
header("Location: pemesanan.php"); // Redirect back to the form
?>