<?php
session_start();
include('koneksiDB.php');

if (isset($_POST['login_now_btn'])) 
{
    if (!empty(trim($_POST['email']) && !empty(trim($_POST['passowrd']))))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['passowrd']);

        $login_query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $row = mysqli_fetch_array($login_query_run);

            if ($row['verify_status'] == "1") 
            {
                // Check user role and redirect accordingly
                if ($row['level'] == 'admin') 
                {
                    header("Location: dashboard.php"); // Redirect to dashboard
                    exit(0);
                } 
                else if ($row['level'] == 'user') 
                {
                    $_SESSION['email'] = $email;
                    header("Location: pemesanan.php"); // Redirect to user page
                    exit(0);
                }
            }
            else{
                $_SESSION['status'] = "Akun anda belum diverifikasi";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Email / Password Salah";
            header("Location: login.php");
            exit(0);
        }

    }
    else
    {
        $_SESSION['status'] = "Email / Password Salah";
        header("Location: login.php");
        exit(0);
    }

    
}
?>