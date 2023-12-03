<?php
$con = mysqli_connect("localhost","root","","rembangan_db");


// $con = mysqli_connect("mifc.myhost.id", "mifcmyho_wisata-rembangan", "WSImif2023", "mifcmyho_wisata-rembangan");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>