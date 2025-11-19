<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
    exit; // Tambahkan exit setelah header location
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UmrohGo Admin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <style>
        body {
            background: #f9f7f3;
            font-family: 'Segoe UI', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(to right, #f5e6c8, #e8d2a8);
            border-bottom: 2px solid #d6b57b;
        }

        .navbar-brand {
            color: #7a5a17 !important;
            font-weight: bold;
            font-size: 20px;
        }

        .btn-gold {
            background: #b68832 !important;
            border: none;
            color: white !important;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .btn-gold:hover {
            background: #8e6926 !important;
            transform: translateY(-2px);
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            position: fixed;
            height: 100%;
            top: 56px;
            /* PERBAIKAN: Tambahkan posisi top agar di bawah navbar */
            background: white;
            border-right: 2px solid #ead7b6;
            padding-top: 20px;
        }

        .sidebar a {
            color: #7a5a17;
            padding: 14px 20px;
            display: block;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border-bottom: 1px solid #f3e9d8;
            transition: 0.2s ease-in-out;
        }

        .sidebar a:hover {
            background: #f5efe3;
            color: #5e4511;
            transform: translateX(4px);
        }

        .sidebar .active {
            background: #f0e4cd;
            border-left: 4px solid #c9a86a;
        }

        #content-wrapper {
            margin-top: 56px;
            /* PERBAIKAN: Dorong konten ke bawah fixed-top navbar */
            margin-left: 260px;
            padding: 25px;
        }

        /* USER */
        .user-card {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-card img {
            border-radius: 50%;
            width: 90px;
            border: 3px solid #d1b075;
        }

        .user-card p {
            color: #856a2c;
            font-weight: bold;
            margin-top: 10px;
        }

        /* CARD STATISTIK */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #c9a86a;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 26px;
            font-weight: bold;
            color: #705319;
        }

        h2 {
            color: #755718;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top justify-content-between">
        <a class="navbar-brand">UmrohGo Admin</a>
        <a href="logout.php" class="btn btn-gold btn-sm">Logout</a>
    </nav>

    <div class="sidebar">

        <div class="user-card">
            <img src="../img/find_user.png">
            <p>Hi, <?php echo $_SESSION['username']; ?></p>
        </div>

        <a href="?page=dashboard" class="<?php if (@$_GET['page'] == 'dashboard')
            echo 'active'; ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="?page=jamaah" class="<?php if (@$_GET['page'] == 'jamaah')
            echo 'active'; ?>">
            <i class="bi bi-people-fill"></i> Data Jamaah
        </a>

        <a href="?page=paket" class="<?php if (@$_GET['page'] == 'paket')
            echo 'active'; ?>">
            <i class="bi bi-airplane-fill"></i> Paket Umroh
        </a>

        <a href="?page=inputpaket" class="<?php if (@$_GET['page'] == 'inputpaket')
            echo 'active'; ?>">
            <i class="bi bi-plus-circle-fill"></i> Input Paket
        </a>
    </div>

    <div id="content-wrapper">

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "dashboard";

        if ($page == "dashboard") {
            // Konten Dashboard
            ?>

            <h2>Dashboard</h2>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <p>Total Pelanggan</p>
                        <div class="stat-number">120</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <p>Total Paket</p>
                        <div class="stat-number">5</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <p>Berangkat Bulan Ini</p>
                        <div class="stat-number">3</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">
                        <p>Pendapatan</p>
                        <div class="stat-number">Rp 76 Jt</div>
                    </div>
                </div>
            </div>

            <?php
        }

        // PERBAIKAN LOGIKA INCLUDE
        if ($page == "jamaah") {
            include "daftartampil.php";
        }

        if ($page == "paket") {
            include "daftarpaket.php";
        }

        if ($page == "inputpaket") {
            include "inputpaket.php";
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Pastikan Anda hanya menginisialisasi DataTables jika tabel tersebut ada di halaman.
            if ($('#tabel-data').length) {
                $('#tabel-data').DataTable({
                    "pageLength": 10,
                    "lengthChange": true,
                    "ordering": true
                });
            }
        });
    </script>

</body>

</html>