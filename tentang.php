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
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="katalog.php">Tiket Pesawat</a></li>
                <li><a href="kontak.php">Kontak Kami</a></li>
                <li><a href="pesanan.php">Pesanan Saya <span class="jumlah_bookings"><?= $total_bookings; ?></span></a></li>
                <li><a href="tim.php">Tim Kami</a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout <i class="fas fa-power-off fa-1x"></i></a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Traveloka <i class="fab fa-accusoft"></i></h3>
            <p>Intip kisah kami yuk,
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
                <center><img src="images/traveloka.png" width="400px"></center>
                <p style="text-indent: 1.2rem;text-align: justify;">Traveloka adalah perusahaan teknologi terkemuka di Asia Tenggara yang menyediakan akses bagi masyarakat untuk menemukan dan memesan berbagai layanan transportasi, akomodasi, aktivitas dan gaya hidup, serta keuangan. Sebagai lifestyle super app di Asia Tenggara, Traveloka memiliki portofolio produk yang lengkap meliputi layanan transportasi seperti tiket pesawat, bus, kereta api, sewa mobil, antar-jemput bandara, serta berbagai pilihan akomodasi, termasuk hotel, apartemen, guest house, homestay, resort, dan villa.</p>

                <h4>Sejarah</h4>
                <p style="text-indent: 1.2rem;text-align: justify;">
                  Perjalanan kami dimulai dari platform pemesanan penerbangan dan hotel online namun sampai hari ini kami menyediakan lebih dari 20 produk yang terus bertambah, memberi akses tanpa batas ke perjalanan, layanan lokal, dan kebutuhan finansial yang memperkaya pengalaman jutaan orang. Aplikasi Traveloka telah diunduh lebih dari 60 juta kali, menjadikannya aplikasi pemesanan perjalanan dan gaya hidup terpopuler di kawasan Asia Tenggara.
                </p>

                <h4>Misi</h4>
                <p style="text-indent: 1.2rem;text-align: justify;">
                  Melalui inovasi terus-menerus, Traveloka berkembang untuk membantu sebanyak mungkin orang di seluruh dunia memenuhi aspirasi gaya hidup mereka. Misi kami adalah memampukan Anda untuk memenuhi aspirasi gaya hidup sehari-hari dengan produk terintegrasi dalam satu platform.
                </p>
            </div>
        </div>
    </main>

    <footer>
        <p>&#169 Traveloka <i class="fab fa-accusoft"></i> 2021</p>
    </footer>
</body>
</html>