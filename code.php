<?php
session_start();
include('koneksiDB.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug  = 2;                       
    $mail->isSMTP();                                
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                      

    $mail->Username   = 'mm';                     
    $mail->Password   = 'mm';

    $mail->SMTPSecure = 'tls';             
    $mail->Port       = 587;

    $mail->setFrom('potanut12@gmail.com','E-TICKETING REMBANGAN');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Verifikasi Akun Anda di Wisata Rembangan';

    $email_template = "
       <html>
<head>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 10px;
            margin: auto;
            display: block;
            width: 200px;
            text-decoration: none; /* Removes underline */
            color: white; /* Makes text color white */
        }
        .button-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Anda telah registrasi pada laman Wisata Rembangan</h2>
    <h5>Verifikasi email anda untuk login pada link di bawah ini</h5>
    <div class='button-container'>
        <a href='http://localhost/E-TICKET-REMBANGAN/verify-email.php?token=$verify_token' class='button'>Klik Disini Untuk Verifikasi</a>
    </div>
</body>
</html>";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'pesan sudah terkirim';
}

if (isset ($_POST['register_btn']))
{
    $name = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Enkripsi password
    $verify_token = md5(rand());

    //email Exist or Not
    $check_email_query = "SELECT email FROM user WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Sudah Terdaftar";
        header("Location: register.php");
    }
    else
    {
        // Validate 'nama'
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
        {
            $_SESSION['status'] = "Hanya huruf dan spasi yang diizinkan di Nama";
            header("Location: register.php"); // Redirect back to the form
            exit(0);
        }
        else
        {
            //Insert user / register user data
            $query = "INSERT INTO user (nama, telp, email, password, verify_token) VALUES ('$name', '$telp', '$email', '$password', '$verify_token')";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                sendemail_verify("$name", "$email", "$verify_token");
                $_SESSION['status'] = "Regristrasi Berhasil.! Mohon Cek Email Anda Untuk Verifikasi Akun";
                header("Location: register.php");
                
            }
            else {
                $_SESSION['status'] = "Regristrasi Gagal";
                header("Location: register.php");
            }
        }
    }
}
?>