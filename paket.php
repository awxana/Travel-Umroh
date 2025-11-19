<?php
// PASTIKAN FILE KONEKSI.PHP BERADA DI DIREKTORI YANG SAMA DENGAN PAKET.PHP
include "koneksi.php";

// Query untuk mengambil data paket
$query = "SELECT * FROM data_paket ORDER BY biaya ASC";
$sql = mysqli_query($koneksi, $query);

// Fungsi untuk membersihkan dan memformat data
function format_rupiah($angka)
{
  return number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Paket Umroh | UmrohGo Travel</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <style>
    /* ===== GLOBAL STYLE & UTILITY ===== */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f7f7f7;
      /* Background lebih soft */
      color: #333;
      margin: 0;
      padding: 0;
      padding-top: 70px;
    }

    .section-title {
      margin: 40px 0 20px 0;
      color: #d4af37;
      font-weight: 700;
      text-align: center;
    }

    /* Tombol dan Warna Utama */
    .color-primary {
      color: #d4af37 !important;
    }

    .btn-primary-custom {
      background: #d4af37;
      border: none;
      color: white;
      font-weight: 600;
      transition: background 0.2s;
      border-radius: 6px;
    }

    .btn-primary-custom:hover {
      background: #b89630;
      color: white;
    }

    /* Navbar Toggler Icon (dipindah dari inline style) */
    .navbar-toggler-icon-custom {
      filter: invert(40%) sepia(50%) saturate(500%) hue-rotate(10deg) brightness(95%) contrast(90%);
    }

    /* ===== NAVBAR & LOGO ===== */
    .navbar {
      background: #ffffff;
      border-bottom: 2px solid #d4af37;
    }

    .navbar a {
      color: #333 !important;
      font-weight: 500;
    }

    .navbar a:hover,
    .navbar a.active {
      color: #d4af37 !important;
    }

    .navbar-brand {
      color: #d4af37 !important;
      font-weight: 600;
    }

    /* ===== CARD PAKET ===== */
    .card.f-beranda {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      background: #ffffff;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      transition: 0.3s ease;
    }

    .card.f-beranda:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .card .image-card {
      border-bottom: 4px solid #d4af37;
      object-fit: cover;
      /* Memastikan gambar terisi penuh tanpa distorsi */
    }

    .card-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #2f2f2f;
      margin-bottom: 10px;
    }

    /* Detail Paket */
    .list-group-item {
      border: none;
      border-bottom: 1px solid #f2f2f2;
      color: #555;
      font-size: 0.95rem;
      padding: 8px 15px;
    }

    .list-group-item strong {
      color: #333;
      /* Menegaskan label */
      font-weight: 600;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #ffffff;
      padding: 50px 0;
      border-top: 3px solid #d4af37;
    }

    footer h6 {
      color: #d4af37;
      font-weight: 600;
      margin-bottom: 15px;
    }

    footer p {
      color: #444;
    }

    .footer-hr {
      background-color: #d4af37;
      /* Mengganti hr accent */
      height: 3px;
      width: 60px;
      margin-bottom: 15px;
      display: inline-block;
    }

    .footer-copyright {
      background: #d4af37;
      color: white;
      padding: 12px;
      margin-top: 30px;
      font-weight: 500;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar fixed-top navbar-expand-lg">
      <a class="navbar-brand" href="beranda.php">
        <img src="img/logo.png" style="max-width:40px; margin-right:8px;" alt="Logo UmrohGo">
        UmrohGo Travel
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-toggler-icon-custom"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="beranda.php">Beranda</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link color-primary" href="paket.php">Paket Umroh</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar.php">Daftar Online</a>
          </li>
        </ul>

        <a class="btn btn-primary-custom" href="admin/index.php">
          Login
        </a>
      </div>
    </nav>
  </header>
  <div class="container" style="margin-top: 20px;">
    <div class="row text-center">
      <div class="col-12">
        <h1 class="display-4 section-title">Pilihan Paket Umroh Terbaik Kami 🕋</h1>
        <p class="lead mb-5">Pilih paket yang paling sesuai dengan kebutuhan ibadah Anda.</p>
      </div>
    </div>
  </div>

  <div class="container mb-5">
    <div class="row">
      <?php
      // Perulangan untuk menampilkan setiap paket
      if (mysqli_num_rows($sql) > 0) {
        while ($data = mysqli_fetch_array($sql)) {
          // Gunakan variabel PHP untuk mempermudah pemanggilan
          $nama_paket = htmlspecialchars($data['nama_paket']);
          $biaya = format_rupiah($data['biaya']);
          $durasi = htmlspecialchars($data['durasi']);
          $keberangkatan = htmlspecialchars($data['keberangkatan']);
          $hotel_mekkah = htmlspecialchars($data['hotel_mekkah']);
          $hotel_madinah = htmlspecialchars($data['hotel_madinah']);
          $url_daftar = "daftar.php?paket=" . urlencode($nama_paket);
          ?>

          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex">
            <div class="card f-beranda h-100 w-100">
              <img class="card-img-top image-card" src="img/mina.jpg" alt="Gambar Paket <?php echo $nama_paket; ?>"
                height="200px">

              <div class="card-body d-flex flex-column">
                <a href="<?php echo $url_daftar; ?>" class="text-dark" style="text-decoration:none;">
                  <h5 class="card-title"><?php echo $nama_paket; ?></h5>
                </a>

                <ul class="list-group list-group-flush mt-auto mb-3">
                  <li class="list-group-item"><strong>Biaya</strong> : Rp <?php echo $biaya; ?></li>
                  <li class="list-group-item"><strong>Durasi</strong> : <?php echo $durasi; ?></li>
                  <li class="list-group-item"><strong>Keberangkatan</strong> : <?php echo $keberangkatan; ?>
                  </li>
                  <li class="list-group-item"><strong>Hotel Mekkah</strong> : <?php echo $hotel_mekkah; ?>
                  </li>
                  <li class="list-group-item"><strong>Hotel Madinah</strong> : <?php echo $hotel_madinah; ?>
                  </li>
                </ul>

                <a href="<?php echo $url_daftar; ?>" class="btn btn-primary-custom mt-auto">Pesan Sekarang</a>
              </div>
            </div>
          </div>

          <?php
        } // end while
      } else {
        // Jika tidak ada data
        echo '<div class="col-12 text-center mt-5"><p class="lead">Maaf, saat ini **tidak ada paket Umroh** yang tersedia.</p></div>';
      }
      ?>
    </div>
  </div>
  <hr>

  <footer class="page-footer font-small unique-color-dark">

    <div class="container text-center text-md-left mt-5">
      <div class="row">

        <div class="col-sm-3">
          <h3 style="margin-top: 20px;">
            <img src="img/logo.png" style="max-width:120px;" alt="Logo UmrohGo Footer">
          </h3>
          <div class="footer-hr mx-auto d-inline-block"></div>
        </div>

        <div class="col-sm-3">
          <h6 class="text-uppercase font-weight-bold">Alamat Kantor Pusat</h6>
          <div class="footer-hr mx-auto d-inline-block"></div>
          <p>Komplek cendrawasi Jl. Karangdowo – Solo Km 3,5, Bakungan, Karangdowo, Klaten 57464</p>
        </div>

        <div class="col-sm-3">
          <h6 class="text-uppercase font-weight-bold">Email</h6>
          <div class="footer-hr mx-auto d-inline-block"></div>
          <p>zatabbarutour@gmail.com</p>
        </div>

        <div class="col-sm-3">
          <h6 class="text-uppercase font-weight-bold">Call Center</h6>
          <div class="footer-hr mx-auto d-inline-block"></div>
          <p>(0272) 456478</p>
        </div>

      </div>
    </div>

    <div class="footer-copyright text-center py-3">
      © 2025 Copyright:
      <a href="beranda.php" class="text-white font-weight-bold" style="text-decoration: none;"> UmrohGo Umroh Tour
        & Travel</a>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>