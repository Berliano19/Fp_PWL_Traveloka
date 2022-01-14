<?php 
session_start();

if (isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('admin');
       </script>";
  exit;
}
if (!isset($_SESSION['user'])) {
   echo "<script>
         window.location.replace('login.php');
       </script>";
  exit;
}
require 'functions.php';

 if (isset($_SESSION['username'])) {
     $username = $_SESSION['username'];

     $bookings = mysqli_query($conn, "SELECT * FROM bookings WHERE username = '$username'"); 

  }

$total_bookings = mysqli_num_rows($bookings);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Icon dari Fontawesome -->
    <script src="https://kit.fontawesome.com/348c676099.js" crossorigin="anonymous"></script>

    <title>Traveloka</title>
    <style>
      body {
          background-image: url("images/bg.jpeg");
          background-size: contain;
        }
        #content {
            width: 100%;
        }
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: red;
        } 
        .featured-image {
          transition: 1s;
          cursor: pointer;
        }
        .featured-image:hover {
          transition: 1s;
          transform: scale(1.5);
        }
        td {
          padding: 10px 20px;
          transition: 0.6s;
          cursor: pointer;
        }
        td:hover {
          transition: 0.6s;
          background-color: lightgrey;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="katalog.php">Tiket Pesawat</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="kontak.php">Kontak Kami</a></li>
                <li><a href="pesanan.php">Pesanan Saya <span class="jumlah_bookings"><?= $total_bookings; ?></span></a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout <i class="fas fa-power-off fa-1x"></i></a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Traveloka <i class="fab fa-accusoft"></i></h3>
            <p>Kenalan yuk,
            <?php
                    if (isset($_SESSION['username'])) {
                     $username = $_SESSION['username'];

                     $query = mysqli_query($conn, "SELECT nama FROM user WHERE username = '$username'"); 
                     foreach ($query as $cf) {}

                     if($query->num_rows > 0) {
                      echo $cf['nama'];
                      }
                  }
                ?>
            </p>
        </div>
    </header>

    <main>
        <div id="content">
            <div class="card" style="margin: 100px 0;">
                <center>
                  <img src="images/amikom.png" width="300px">
                  <h3>Kelompok 11</h3>
                  <table>
                    <tr>
                      <td>BERLIANO ADEVITRA PERMANA </td>
                      <td>19.11.3276</td>
                    </tr>
                    <tr>
                      <td>RISKA ANDRIANA MELIANTO </td>
                      <td>19.11.3269</td>
                    </tr>
                    <tr>
                      <td>REVITTO PRASTIASINA </td>
                      <td>19.11.3261</td>
                    </tr>
                    <tr>
                      <td>RAIHAN PRANATA SABILILLAH </td>
                      <td>19.11.71</td>
                    </tr>
                  </table>
                </center>
            </div>
        </div>
    </main>

    <footer>
        <p>&#169 Traveloka <i class="fab fa-accusoft"></i> 2021</p>
    </footer>
</body>
</html>