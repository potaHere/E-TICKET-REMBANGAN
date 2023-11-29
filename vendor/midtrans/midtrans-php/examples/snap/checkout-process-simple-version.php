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
$customer = $_SESSION['customer'];
$total = $_SESSION['total'];
$item_details = $_SESSION['item_details'];

// Required
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $total, // no decimal allowed for creditcard
);
// // Optional
// $item_details = array (
//     array(
//         'id' => 'a1',
//         'price' => 94000,
//         'quantity' => 1,
//         'name' => "Apple"
//     ),
//   );
// // Optional
// $customer_details = array(
//     'first_name'    => "Andri",
//     'last_name'     => "Litani",
//     'email'         => "andri@litani.com",
//     'phone'         => "081122334455",
//     'billing_address'  => $billing_address,
//     'shipping_address' => $shipping_address
// );
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
echo "snapToken = ".$snapToken;
?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay!</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>');
            };
        </script>
    </body>
</html>
