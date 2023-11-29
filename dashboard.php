<?php 
session_start();
require ('koneksiDB.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'main-dashboard';
?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
          <link rel="stylesheet" href="css/style-dashboard.css">
          <title>Dashboard</title>
          <link rel="shortcut icon" href="picture/img/logo/logo-rembangan.png">
     </head>
     <body>
          <!-- SIDEBAR-->
          <section id="sidebar">
          <a class="brand" style="pointer-events: none;">
               <i class='bx bxs-smile'></i>
               <span class="text">E-Ticket Rembangan</span>
          </a>
          <ul class="side-menu top">
               <li class="<?php echo ($page == 'main-dashboard' ? 'active' : ''); ?>">
                    <a href="dashboard.php?page=main-dashboard">
                         <i class="bx bxs-dashboard"></i>
                         <span class="text">Dashboard</span>
                    </a>
               </li>
               <li class="<?php echo ($page == 'scan-dashboard' ? 'active' : ''); ?>">
                    <a href="dashboard.php?page=scan-dashboard">
                         <i class="bx bxs-shopping-bag-alt"></i>
                         <span class="text">Scan Tiket</span>
                    </a>
               </li>
               <li class="<?php echo ($page == 'tabel-dashboard' ? 'active' : ''); ?>">
                    <a href="dashboard.php?page=tabel-dashboard">
                         <i class="bx bxs-doughnut-chart"></i>
                         <span class="text">History</span>
                    </a>
               </li>
          </ul>
          <ul class="side-menu">
               <li>
                         <a href="login.php" class="logout">
                              <i class="bx bxs-log-out-circle"></i>
                              <span class="text">Log Out</span>
                         </a>
               </li>
          </ul>
          </section>
          <!-- SIDEBAR -->

          <!-- CONTENT -->
          <section id="content">
               <!-- NAVBAR -->
               <nav>
               <i class="bx bx-menu"></i>
               <!-- <a href="#" class="nav-link">Categories</a> -->
               <form action="#">
                         <div class="form-input">
                              <input type="search" placeholder="Search...">
                              <button type="submit" class="search-btn"><i class="bx bx-search"></i></button>
                         </div>
               </form>
               <input type="checkbox" id="switch-mode" hidden>
               <label for="switch-mode" class="switch-mode"></label>
               </nav>
               <!-- NAVBAR -->

               <!-- MAIN -->
               <?php 
               if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                         case 'main-dashboard':
                              include 'main-dashboard.php';
                              break;
                         case 'scan-dashboard':
                              include 'scan-dashboard.php';
                              break;
                         case 'tabel-dashboard':
                              include 'tabel-dashboard.php';
                              break;
                         default:
                              include 'main-dashboard.php'; // Halaman default jika parameter tidak sesuai
                              break;
                    }
               } else {
               include 'main-dashboard.php'; // Halaman default jika parameter tidak ada
               }
               // include ('.php'); 
               ?>
               <!-- MAIN -->
          </section>
          <!-- CONTENT -->
          <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
          <script src="js/script-dashboard.js"></script>
     </body>
</html>