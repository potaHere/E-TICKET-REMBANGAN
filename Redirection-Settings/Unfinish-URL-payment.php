<?php
session_start();
include('../koneksiDB.php');

$_SESSION['status'] = "Pembelian gagal,";
header("Location: login.php"); // Redirect back to the form
?>