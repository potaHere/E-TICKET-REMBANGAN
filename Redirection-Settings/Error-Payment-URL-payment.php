<?php
session_start();
include('../koneksiDB.php');

$_SESSION['status'] = "Terjadi Kesalahan, Silahkan lakukkan login kembali dan lakukan transaksi ulang";
header("Location: login.php"); // Redirect back to the form
?>