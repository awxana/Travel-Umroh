<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UmrohGo Travel | Perjalanan Umroh Penuh Makna</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    /* ===== GLOBAL STYLE ===== */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
        color: #333;
        margin: 0;
        padding: 0;
        padding-top: 70px;
        /* Geser konten ke bawah navbar */
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

    .navbar a:hover {
        color: #d4af37 !important;
    }

    .navbar-brand {
        color: #d4af37 !important;
        font-weight: 600;
    }

    /* Mengganti inline style pada navbar-toggler-icon ke class jika memungkinkan */
    .navbar-toggler-icon-custom {
        filter: invert(40%) sepia(50%) saturate(500%) hue-rotate(10deg) brightness(95%) contrast(90%);
    }

    /* ===== HERO / JUMBOTRON ===== */
    .jumbotron {
        padding: 0;
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        background: none;
        margin-bottom: 60px;
        min-height: 450px;
    }

    .jumbotron img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        filter: brightness(60%);
        border-radius: 12px;
    }

    /* Teks di Tengah Jumbotron */
    .jumbotron>h1,
    .jumbotron>.lead {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        width: 90%;
        max-width: 900px;
    }

    .jumbotron h1 {
        font-weight: 700;
        font-size: 3.2rem;
        color: #ffffff;
        top: 45%;
        transform: translate(-50%, -50%);
        text-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
    }

    .jumbotron .lead {
        top: 65%;
        left: 50%;
        transform: translateX(-50%);
        width: 85%;
        max-width: 750px;
        color: #f5f5f5;
        font-size: 1.1rem;
        line-height: 1.6;
        text-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    }

    /* ===== SECTIONS & TITLES ===== */
    .my-5-custom {
        margin-top: 60px !important;
        margin-bottom: 60px !important;
    }

    .section-title {
        margin: 40px 0 20px 0;
        color: #d4af37;
        font-weight: 700;
        text-align: center;
    }

    .shadow-soft {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        border-radius: 12px;
    }

    /* ===== FITUR UNGGULAN (KENAPA MEMILIH KAMI) ===== */
    .feature-box {
        padding: 30px 20px;
        background: #fcfcfc;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 20px;
        height: 100%;
        transition: 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .feature-box:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .feature-box h4 {
        color: #d4af37;
        font-weight: 600;
        font-size: 1.2rem;
        margin-top: 15px;
    }

    .feature-box p {
        color: #666;
        font-size: 0.95rem;
    }

    .feature-box i {
        color: #d4af37;
        font-size: 3rem;
    }

    /* ===== TESTIMONIAL ===== */
    .testimonial-card {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border-left: 5px solid #d4af37;
        height: 100%;
        margin-bottom: 30px;
    }

    .testimonial-card p {
        font-style: italic;
        color: #444;
    }

    .testimonial-card small {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #d4af37;
        font-size: 1rem;
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
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2f2f2f;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #f2f2f2;
        color: #555;
        font-size: 0.9rem;
    }

    /* Tombol Login (diberi kelas baru agar CSS tidak inline) */
    .btn-login-custom {
        background: #d4af37;
        color: white;
        font-weight: 600;
        border-radius: 6px;
        padding: 6px 14px;
        margin-left: 15px;
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

    .footer-logo img {
        max-width: 120px;
        margin-top: 20px;
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
                    <li class="nav-item"><a class="nav-link" href="beranda.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="paket.php">Paket Umroh</a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar.php">Daftar Online</a></li>
                </ul>
                <a class="btn btn-login-custom" href="admin/index.php">Login</a>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron shadow-soft">
                    <img src="img/mekkah.jpg" class="img-fluid" alt="Masjidil Haram di Mekkah">

                    <h1>Panggilan Suci Menanti Anda di Tanah Haram</h1>

                    <p class="lead">
                        Bersama UmrohGo Travel, wujudkan impian Umroh Anda dengan layanan prima dan bimbingan ibadah
                        yang sesuai sunnah. Kami berkomitmen menyelenggarakan perjalanan yang aman, nyaman, dan
                        berkesan, didukung oleh izin resmi dan tim profesional.
                    </p>
                </div>
            </div>
        </div>

        <div class="row text-center my-5-custom">
            <div class="col-12">
                <h2 class="section-title">Kenapa Harus Memilih Kami?</h2>
            </div>
        </div>
        <div class="row my-5-custom">
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <h4>Harga Transparan</h4>
                    <p>Semua biaya dijelaskan di awal tanpa ada biaya tersembunyi. Kami jamin harga terbaik.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-check-circle"></i>
                    <h4>Izin Resmi Kemenag</h4>
                    <p>Terdaftar dan berizin resmi dari Kementerian Agama RI. Perjalanan Anda terjamin aman.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-mosque"></i>
                    <h4>Bimbingan Ibadah</h4>
                    <p>Dibimbing langsung oleh ustadz/muthawwif profesional sesuai tuntunan Sunnah.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <i class="fas fa-hotel"></i>
                    <h4>Akomodasi Terbaik</h4>
                    <p>Kami menyediakan hotel bintang 4 dan 5 yang dekat dengan Masjidil Haram dan Nabawi.</p>
                </div>
            </div>
        </div>

        <div class="row text-center my-5-custom">
            <div class="col-12">
                <h2 class="section-title">Apa Kata Mereka?</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <p>"Alhamdulillah, perjalanan Umroh bersama UmrohGo Travel sangat berkesan. Pelayanannya
                        ramah, hotelnya dekat, dan bimbingan ibadahnya sangat jelas. Sangat direkomendasikan!"</p>
                    <small>Bpk. Haris & Ibu Siti - Jakarta</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <p>"Awalnya ragu, tapi ternyata semua fasilitas sesuai yang dijanjikan. Muthawwif-nya
                        sabar dan sangat membantu. Terima kasih UmrohGo Travel!"</p>
                    <small>Ibu Fatimah - Solo</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <p>"Pengalaman spiritual yang luar biasa. Penerbangan lancar, makanan enak, dan ziarah ke
                        tempat bersejarah dikemas dengan sangat baik. Semoga bisa Umroh lagi bersama UmrohGo."</p>
                    <small>Bpk. Tono Nugroho - Surabaya</small>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Paket Unggulan Kami</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="card f-beranda">
                    <img class="card-img-top image-card" src="img/mina.jpg" alt="Paket Mina" height="200px">
                    <div class="card-body">
                        <a href="paketmina.php">
                            <h5 class="card-title">Paket Mina</h5>
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">Biaya 28.000.000</li>
                            <li class="list-group-item">Durasi : 12 Hari</li>
                            <li class="list-group-item">Berangkat 20 Desember 2018</li>
                            <li class="list-group-item">Garuda Indonesia (Solo-Jeddah-Solo)</li>
                            <li class="list-group-item">Hotel Mekkah : Olayan Ajyad</li>
                            <li class="list-group-item">Hotel Madinah : Mirat Salam</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card f-beranda">
                    <img class="card-img-top image-card" src="img/arofah.jpg" alt="Paket Arofah" height="200px">
                    <div class="card-body">
                        <a href="paketarofah.php">
                            <h5 class="card-title">Paket Arofah</h5>
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">Biaya 28.000.000</li>
                            <li class="list-group-item">Durasi : 12 Hari</li>
                            <li class="list-group-item">Berangkat 20 Desember 2018</li>
                            <li class="list-group-item">Garuda Indonesia (Solo-Jeddah-Solo)</li>
                            <li class="list-group-item">Hotel Mekkah : Olayan Ajyad</li>
                            <li class="list-group-item">Hotel Madinah : Mirat Salam</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card f-beranda">
                    <img class="card-img-top image-card" src="img/safa.jpg" alt="Paket Safa" height="200px">
                    <div class="card-body">
                        <a href="paketsafa.php">
                            <h5 class="card-title">Paket Safa</h5>
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">Biaya 28.000.000</li>
                            <li class="list-group-item">Durasi : 12 Hari</li>
                            <li class="list-group-item">Berangkat 20 Desember 2018</li>
                            <li class="list-group-item">Garuda Indonesia (Solo-Jeddah-Solo)</li>
                            <li class="list-group-item">Hotel Mekkah : Olayan Ajyad</li>
                            <li class="list-group-item">Hotel Madinah : Mirat Salam</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card f-beranda">
                    <img class="card-img-top image-card" src="img/muzdalifah.jpg" alt="Paket Muzdalifah" height="200px">
                    <div class="card-body">
                        <a href="paketmuzdalifa.php">
                            <h5 class="card-title">Paket Muzdalifah</h5>
                        </a>
                        <ul class="list-group">
                            <li class="list-group-item">Biaya 28.000.000</li>
                            <li class="list-group-item">Durasi : 12 Hari</li>
                            <li class="list-group-item">Berangkat 20 Desember 2018</li>
                            <li class="list-group-item">Garuda Indonesia (Solo-Jeddah-Solo)</li>
                            <li class="list-group-item">Hotel Mekkah : Olayan Ajyad</li>
                            <li class="list-group-item">Hotel Madinah : Mirat Salam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small unique-color-dark">
        <div class="container text-center text-md-left mt-5">
            <div class="row">

                <div class="col-sm-3">
                    <div class="footer-logo">
                        <img src="img/logo.png" alt="Logo UmrohGo">
                    </div>
                </div>

                <div class="col-sm-3">
                    <h6 class="text-uppercase font-weight-bold">Alamat Kantor Pusat</h6>
                    <div class="footer-hr"></div>
                    <p>Komplek cendrawasi Jl. Karangdowo – Solo Km 3,5, Bakungan, Karangdowo, Klaten 57464</p>
                </div>

                <div class="col-sm-3">
                    <h6 class="text-uppercase font-weight-bold">Email</h6>
                    <div class="footer-hr"></div>
                    <p>zatabbarutour@gmail.com</p>
                </div>

                <div class="col-sm-3">
                    <h6 class="text-uppercase font-weight-bold">Call Center</h6>
                    <div class="footer-hr"></div>
                    <p>(0272) 456478</p>
                </div>

            </div>
        </div>

        <div class="footer-copyright text-center py-3">
            © 2025 Copyright:
            <a href="beranda.php"> UmrohGo Umroh Tour & Travel</a>
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