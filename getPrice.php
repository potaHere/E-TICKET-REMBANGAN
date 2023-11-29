<?php
include 'koneksiDB.php';

// Fetch prices for people
$sql = "SELECT jenis, harga FROM harga_tiket";
$result = $con->query($sql);

$prices = [];
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $prices['people'][$row["jenis"]] = $row["harga"];
  }
}

// Fetch prices for transport
$sql = "SELECT jenis, harga FROM harga_kendaraan";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $prices['transport'][$row["jenis"]] = $row["harga"];
  }
}

$con->close();

echo json_encode($prices);
?>