<?php 
session_start();
include('koneksiDB.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug  = 2;                       
    $mail->isSMTP();                                
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                      

    $mail->Username   = '';                     
    $mail->Password   = '';

    $mail->SMTPSecure = 'tls';             
    $mail->Port       = 587;

    $mail->setFrom('potanut12@gmail.com','E-TICKETING REMBANGAN');
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = 'Reset Password Notification';

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
        <h2>Anda menerima email karena kami mendapatkan permintaan Pembaharuan password untuk akun anda pada laman <b>Wisata Rembangan</b></h2>
        <h5>Jangan bagikan link ini kepada siapapun, abaikan email ini jika bukan ada yang meminta perubahan password!</h5>
        <div class='button-container'>
            <a href='http://localhost/E-TICKET-REMBANGAN/password-change.php?token=$token&email=$get_email' class='button'>Klik Disini</a>
        </div>
    </body>
    </html>";

    $mail->Body = $email_template;
    $mail->send();
}


if(isset($_POST['password_reset_link']))
{
    $email = mysqli_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM user WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) 
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['nama'];
        $get_email = $row['email'];

        $update_token = "UPDATE user SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "Link Pembaharuan Passowrd Telah Dikirim Ke Email Anda";
            header("Location: password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Something Went Wrong #1";
            header("Location: password-reset.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Email Tidak Ditemukan";
        header("Location: password-reset.php");
        exit(0);
    }
}



if (isset($_POST['password_update'])) 
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($con,$_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            //check token valid or not
            $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE user SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        $_SESSION['status'] = "Password Berhasil Diubah";
                        header("Location: login.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Password Gagal Diubah";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    
                    }
                }
                else
                {
                    $_SESSION['status'] = "Password dan Konfirmasi Password Tidak Sama";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Semua Field Harus Diisi";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Token Tidak Tersedia";
            header("Location: password-change.php");
            exit(0);
    }
}

?>