<?php
// PASTIKAN FILE KONEKSI.PHP BERADA DI DIREKTORI YANG SAMA DENGAN DAFTAR.PHP
include "koneksi.php";

// Ambil parameter paket dari URL, jika ada
$selected_paket = isset($_GET['paket']) ? urldecode($_GET['paket']) : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Online | UmrohGo Travel</title>
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
        padding-top: 70px;
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

    .navbar-toggler-icon-custom {
        filter: invert(40%) sepia(50%) saturate(500%) hue-rotate(10deg) brightness(95%) contrast(90%);
    }

    /* ===== NAVBAR & LOGO (Dibuat konsisten dengan paket.php) ===== */
    .navbar {
        background: #ffffff;
        border-bottom: 2px solid #d4af37;
    }

    .navbar a {
        color: #333 !important;
        font-weight: 500;
    }

    .navbar-brand {
        color: #d4af37 !important;
        font-weight: 600;
    }

    /* ===== FORM STYLING ===== */
    .form-container {
        background: #ffffff;
        /* Lebih menonjol dari background body */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 60px;
    }

    .form-title {
        color: #d4af37;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .form-group label {
        font-weight: 600;
        /* Lebih tebal */
        color: #2f2f2f;
    }

    .info-text {
        font-size: 0.85rem;
        color: #777;
        margin: 10px 0;
        display: block;
        background-color: #fff8e1;
        /* Background kuning lembut untuk notifikasi */
        padding: 10px;
        border-left: 4px solid #d4af37;
        border-radius: 4px;
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        color: white;
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    /* Footer Style (Dibuat konsisten) */
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

    .footer-copyright {
        background: #d4af37;
        color: white;
        padding: 12px;
        margin-top: 30px;
        font-weight: 500;
    }

    .footer-hr {
        background-color: #d4af37;
        height: 3px;
        width: 60px;
        margin-bottom: 15px;
        display: inline-block;
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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon navbar-toggler-icon-custom"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paket.php">Paket Umroh</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-primary" href="daftar.php">Daftar Online</a>
                    </li>
                </ul>
                <a class="btn btn-primary-custom" href="admin/index.php" style="margin-left:15px;">
                    Login
                </a>
            </div>
        </nav>
    </header>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <h1 class="text-center form-title">Formulir Pendaftaran Online 🖋️</h1>

                    <form method="POST" action="proses_simpan.php">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPaket">Paket Umroh</label>
                                    <select class='form-control' id="inputPaket" name="paket" required>
                                        <option value="">Pilih Paket</option>
                                        <?php
                                        // Ambil data paket dari database untuk dropdown
                                        $query_paket = "SELECT DISTINCT nama_paket, biaya FROM data_paket ORDER BY biaya ASC";
                                        $sql_paket = mysqli_query($koneksi, $query_paket);

                                        while ($data_paket = mysqli_fetch_array($sql_paket)) {
                                            $nama_paket = htmlspecialchars($data_paket['nama_paket']);
                                            $selected = ($nama_paket == $selected_paket) ? 'selected' : '';
                                            echo "<option value=\"{$nama_paket}\" {$selected}>{$nama_paket}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputNama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="inputNama" name="nama" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputNoId">Nomor KTP / SIM</label>
                                    <input type="text" class="form-control" id="inputNoId" name="noid" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputNoTelp">No Telepon</label>
                                    <input type="tel" class="form-control" id="inputNoTelp" name="no" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputAlamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="inputAlamat" name="alamat" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputKota">Kota</label>
                                    <input type="text" class="form-control" id="inputKota" name="kota" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputKodePos">Kode Pos</label>
                                    <input type="text" class="form-control" id="inputKodePos" name="kode" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputTempat">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="inputTempat" name="tempat" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputTTL">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="inputTTL" name="ttl" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputNoPasspor">Nomor Paspor</label>
                                    <input type="text" class="form-control" id="inputNoPasspor" name="nopasspor"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label class="d-block">Jenis Kelamin</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis1" id="jenisLaki"
                                            value="Laki-laki" required>
                                        <label class="form-check-label" for="jenisLaki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis1" id="jenisPerempuan"
                                            value="Perempuan">
                                        <label class="form-check-label" for="jenisPerempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <span class="info-text">
                                **Penting!** Setelah menekan tombol Daftar, Anda akan diarahkan ke halaman Konfirmasi
                                Pembayaran.
                            </span>
                            <span class="info-text mb-4">
                                Harap selesaikan pembayaran **DP (Down Payment) dalam waktu 7 hari** setelah pendaftaran
                                agar booking tidak dibatalkan.
                            </span>

                            <div class="mt-4">
                                <input class="btn btn-primary-custom mr-2" type="submit" value="Daftar Sekarang">
                                <input class="btn btn-secondary" type="reset" value="Reset Formulir">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small unique-color-dark">
        <div class="container text-center text-md-left mt-5">
            <div class="row">
                <div class="col-sm mb-3">
                    <h3 style="margin-top: 20px;">
                        <img src="img/logo.png" style="max-width:120px;" alt="Logo Footer">
                    </h3>
                    <div class="footer-hr mx-auto d-inline-block"></div>
                </div>

                <div class="col-sm mb-3">
                    <h6 class="text-uppercase font-weight-bold">Alamat Kantor Pusat</h6>
                    <div class="footer-hr mx-auto d-inline-block"></div>
                    <p>Komplek cendrawasi Jl. Karangdowo – Solo Km 3,5, Bakungan, Karangdowo, Klaten 57464</p>
                </div>

                <div class="col-sm mb-3">
                    <h6 class="text-uppercase font-weight-bold">Email</h6>
                    <div class="footer-hr mx-auto d-inline-block"></div>
                    <p>umrohgotour@gmail.com</p>
                </div>

                <div class="col-sm mb-3">
                    <h6 class="text-uppercase font-weight-bold">Call Center</h6>
                    <div class="footer-hr mx-auto d-inline-block"></div>
                    <p>(0272) 456478</p>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3">
            © 2025 Copyright:
            <a href="beranda.php" style="color: white; text-decoration: none;"> UmrohGo Umroh Tour & Travel</a>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
    </footer>

</body>

</html>