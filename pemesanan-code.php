<?php
session_start();
include('koneksiDB.php');

function generateIdPemesanan()
{
    // Dapatkan tanggal saat ini
    $date = new DateTime();

    // Format tanggal menjadi 'ddmmyy'
    $dateString = $date->format('dmy');

    // Buat 4 angka acak
    $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    // Gabungkan semua bagian untuk membuat ID pemesanan
    $idPemesanan = 'WR' . $dateString . $randomNumber;

    return $idPemesanan;
}

$idPemesanan = generateIdPemesanan();

if (isset($_POST['pemesanan_btn'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $dewasa = $_POST['dewasa'];
    $anak = $_POST['anak'];
    $kendaraan = $_POST['kendaraan'];
    $jumlah_kendaraan = $_POST['kendaraan_qty'];
    $total_harga = $_POST['total_harga_int'];

    // Validate 'nama'
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $_SESSION['status'] = "Hanya huruf dan spasi yang diizinkan di Nama";
        header("Location: pemesanan.php"); // Redirect back to the form
        exit(0);
    } else {
        // Check if $name or $tgl_masuk is empty
        if (empty($name) || empty($tgl_masuk)) {
            $_SESSION['status'] = "Nama dan tanggal masuk tidak boleh kosong";
            header("Location: pemesanan.php"); // Redirect back to the form
            exit(0);
        }
        //insert data tiket
        $query = "INSERT INTO tiket (id_tiket, nama, email, tanggal_masuk, jumlah_dewasa, jumlah_anak, jenis_kendaraan, jumlah_kendaraan, total_harga, waktu_transaksi, status_tiket) VALUES ('$idPemesanan', '$name', '$email', '$tgl_masuk', '$dewasa', '$anak', '$kendaraan', '$jumlah_kendaraan', '$total_harga', CURRENT_TIMESTAMP, 'aktif')";
        $query_run = mysqli_query($con, $query);
        include('buat_qrCode.php');

        if ($query_run) {
            $query = "SELECT telp FROM user WHERE email = '$email'";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                $telp = $row['telp'];
            } else {
                echo "No user found with this email";
            }
            $_SESSION['id_pemesanan'] = $idPemesanan;
            $_SESSION['total'] = $total_harga;
            $_SESSION['customer'] = array(
                'first_name'    => "$name",
                'last_name'     => "",
                'email'         => "$email",
                'phone'         => "$telp"
            );

            $hargaKendaraan = 0;
            if ($kendaraan == 'motor') {
                $hargaKendaraan = 1000;
            } else if ($kendaraan == 'mobil') {
                $hargaKendaraan = 2000;
            } else if ($kendaraan == 'truk&bis') {
                $hargaKendaraan = 5000;
            } else {
                $hargaKendaraan = 0;
            }

            $_SESSION['item_details'] = array();

            if (!empty($dewasa)) {
                $_SESSION['item_details'][] = array(
                    'id' => 'a1',
                    'price' => 10000,
                    'quantity' => $dewasa,
                    'name' => "Dewasa"
                );
            }

            if (!empty($anak)) {
                $_SESSION['item_details'][] = array(
                    'id' => 'a2',
                    'price' => 7500,
                    'quantity' => $anak,
                    'name' => "Anak-anak"
                );
            }

            if (!empty($jumlah_kendaraan)) {
                $_SESSION['item_details'][] = array(
                    'id' => 'a3',
                    'price' => $hargaKendaraan,
                    'quantity' => $jumlah_kendaraan,
                    'name' => $kendaraan
                );
            }
            header("Location: vendor/midtrans/midtrans-php/examples/snap-redirect/checkout-process.php"); // Redirect back to the form
        } else {
            $_SESSION['status'] = "Pembelian Gagal";
            header("Location: pemesanan.php"); // Redirect back to the form
        }
    }
}
