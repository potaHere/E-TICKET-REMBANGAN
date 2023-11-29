<?php

namespace Midtrans;

include ('../../../../koneksiDB.php');

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey =  'SB-Mid-server-xRxS2Qvh4H1UVCBAQagWiOa6';
$notif = new Notification();

$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            echo "Transaction order_id: " . $order_id ." is challenged by FDS";
        } else {
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement') {
    $query = "UPDATE tiket SET status_pembayaran = 'Telah Dibayar' WHERE id_tiket = '$order_id'";
    $query_run = mysqli_query($con, $query);
} else if ($transaction == 'pending') {
    $query = "UPDATE tiket SET status_pembayaran = 'Menunggu Pembayaran' WHERE id_tiket = '$order_id'";
    $query_run = mysqli_query($con, $query);
} else if ($transaction == 'deny') {
    $query = "UPDATE tiket SET status_pembayaran = 'Pembayaran Ditolak' WHERE id_tiket = '$order_id'";
    $query_run = mysqli_query($con, $query);
} else if ($transaction == 'expire') {
    $query = "UPDATE tiket SET status_pembayaran = 'Waktu Pembayaran Telah Habis' WHERE id_tiket = '$order_id'";
    $query_run = mysqli_query($con, $query);
} else if ($transaction == 'cancel') {
    $query = "UPDATE tiket SET status_pembayaran = 'Pembelian Dibatalkan' WHERE id_tiket = '$order_id'";
    $query_run = mysqli_query($con, $query);
}
?>