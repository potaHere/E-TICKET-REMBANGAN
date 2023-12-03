<?php

namespace Midtrans;
session_start();

require_once dirname(__FILE__) . '/../../Midtrans.php';
//Set Your server key
Config::$serverKey = "SB-Mid-server-xRxS2Qvh4H1UVCBAQagWiOa6";
Config::$clientKey = "SB-Mid-client-oK4zD8ywG58bH3yp";
// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

$order_id = $_SESSION['id_pemesanan'];
$customer_details = $_SESSION['customer'];
$total = $_SESSION['total'];
$item_details = $_SESSION['item_details'];

// Uncomment for production environment
// Config::$isProduction = true;

// Uncomment to enable sanitization
// Config::$isSanitized = true;

// Uncomment to enable 3D-Secure
// Config::$is3ds = true;

// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $total, // no decimal allowed for creditcard
);

// Fill SNAP API parameter
$params = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

try {
    // Get Snap Payment Page URL
    $paymentUrl = Snap::createTransaction($params)->redirect_url;

    // Redirect to Snap Payment Page
    header('Location: ' . $paymentUrl);
}
catch (Exception $e) {
    echo $e->getMessage();
}
