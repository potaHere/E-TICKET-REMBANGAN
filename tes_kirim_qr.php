<?php
include('koneksiDB.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendemail_verify($email)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug  = 2;                       
    $mail->isSMTP();                                
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                      

    $mail->Username   = 'potanut12@gmail.com';                     
    $mail->Password   = 'qiog wfrr itnt htmk';

    $mail->SMTPSecure = 'tls';             
    $mail->Port       = 587;

    $mail->setFrom('potanut12@gmail.com','E-TICKETING REMBANGAN');
    $mail->addAddress($email);

    $mail->addAttachment('qrcodes/WR2611234905.png');

    $mail->isHTML(true);
    $mail->Subject = 'Tiket Masuk Wisata Rembangan';

    $email_template = "
tes kirim gambar
    ";
    // $url = 'http://wisata-rembangan.mifc.myhost.id';
    $mail->Body = $email_template;
    $mail->send();
    echo 'pesan sudah terkirim';
}

sendemail_verify('potanut12@gmail.com')
?>