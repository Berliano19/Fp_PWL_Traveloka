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
                <li><a href="pesanan.php">Pesanan Saya <span class="jumlah_bookings"><?= $total_bookings; ?></span></a></li>
                <li><a href="tim.php">Tim Kami</a></li>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout <i class="fas fa-power-off fa-1x"></i></a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Traveloka <i class="fab fa-accusoft"></i></h3>
            <p>Hubungi kami jika perlu,
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
                  <h3>Hubungi Kami</h3>
                </center>
                <form action="" method="post">
                    <div class="jarak">
                         <label for="email">Alamat Email <span style="color: red;">*</span></label>
                         <input type="text" id="email" name="email" placeholder="Masukkan Alamat Email" required>
                    </div>
                    <div class="jarak">
                         <label for="pesan">Pesan</label>
                         <textarea rows="20" id="pesan" name="pesan"></textarea>
                    </div>
                    <button type="submit" class="btn" style="width: 100%;background-color: green;">Kirim</button>
                </form>
                <br><br>
                <center>
                <h3>Alamat : </h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126923.69053360063!2d106.69105683272397!3d-6.21545833196839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7c4fef7e2c3%3A0x4eff204c78f6f34f!2sTraveloka%20Customer%20Care%20Center!5e0!3m2!1sid!2sid!4v1641528739768!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </center>
            </div>
        </div>
    </main>

    <footer>
        <p>&#169 Traveloka <i class="fab fa-accusoft"></i> 2021</p>
    </footer>
</body>
</html>