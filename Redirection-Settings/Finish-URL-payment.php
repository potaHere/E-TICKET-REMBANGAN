<?php
session_start();
include('../koneksiDB.php');

$_SESSION['status'] = "Pembelian berhasil, Silahkan lakukkan pembayaran";
header("Location: login.php"); // Redirect back to the form
?>