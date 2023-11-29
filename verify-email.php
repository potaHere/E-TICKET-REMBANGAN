<?php
session_start();
include('koneksiDB.php');

if (isset($_GET['token'])) 
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM user WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) 
    {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_verify_status = "UPDATE user SET verify_status='1' WHERE verify_token='$clicked_token'LIMIT 1";
            $update_verify_status_run = mysqli_query($con, $update_verify_status);

            if($update_verify_status_run)
            {
                $_SESSION['status'] = "Akun anda telah diverifikasi, silahkan login";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Akun anda gagal diverifikasi";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Email Sudah Terverifikasi";
            header("Location: login.php");
            exit(0);
        }
    }
    else {
        $_SESSION['status'] = "Token Tidak Valid";
        header("Location: login.php");
    }
}
else {
    $_SESSION['status'] = "Not Allowed";
    header("Location: login.php");
}
?>