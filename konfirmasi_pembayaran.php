<?php
// PASTIKAN FILE KONEKSI.PHP BERADA DI DIREKTORI YANG SAMA
include "koneksi.php";

// Fungsi untuk membersihkan input (untuk keamanan) HARUS DIDEKLARASIKAN DI AWAL
function clean_input($data)
{
    global $koneksi;
    if (!$koneksi) {
        // Fallback jika koneksi gagal
        return htmlspecialchars($data);
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // Escape string untuk mencegah SQL Injection
    $data = mysqli_real_escape_string($koneksi, $data);
    return $data;
}

// Pastikan parameter id_pendaftar (yaitu NOID) ada dan valid
if (!isset($_GET['id_pendaftar'])) {
    die("ID Pendaftar (NOID) tidak ditemukan di URL. Silakan kembali ke halaman pendaftaran.");
}

// Ambil NOID pendaftar (yang dikirimkan dari proses_simpan.php) dan bersihkan
$noid_pendaftar = clean_input($_GET['id_pendaftar']);

// 1. Ambil data pendaftar berdasarkan NOID dari tabel 'data'
$query_pendaftar = "SELECT * FROM data WHERE noid='$noid_pendaftar'";
$sql_pendaftar = mysqli_query($koneksi, $query_pendaftar);

// --- PENANGANAN ERROR 1: Data Pendaftar ---
if ($sql_pendaftar === false) {
    die("Error SQL (Data Pendaftar): " . mysqli_error($koneksi));
}

if (mysqli_num_rows($sql_pendaftar) == 0) {
    die("Data pendaftar dengan NOID **" . htmlspecialchars($noid_pendaftar) . "** tidak ditemukan.");
}

$data_pendaftar = mysqli_fetch_assoc($sql_pendaftar);
$nama_paket_terpilih = $data_pendaftar['paket'];

// 2. Ambil detail biaya paket dari tabel 'data_paket'
$query_paket = "SELECT biaya FROM data_paket WHERE nama_paket='$nama_paket_terpilih' LIMIT 1";
$sql_paket = mysqli_query($koneksi, $query_paket);

// --- PENANGANAN ERROR 2: Data Paket ---
if ($sql_paket === false) {
    die("Error SQL (Data Paket): " . mysqli_error($koneksi));
}

$data_paket = mysqli_fetch_assoc($sql_paket);

// Ambil nilai dari kolom yang benar: 'biaya'
$biaya_total = $data_paket ? $data_paket['biaya'] : 0;
$dp_persentase = 0.30;
$biaya_dp = $biaya_total * $dp_persentase;

// Fungsi format Rupiah
function format_rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

$formatted_biaya_total = format_rupiah($biaya_total);
$formatted_biaya_dp = format_rupiah($biaya_dp);

// Hitung tanggal jatuh tempo (7 hari dari deadline/tgl daftar)
$tgl_pendaftaran = $data_pendaftar['deadline'];
$batas_bayar = date('d F Y', strtotime($tgl_pendaftaran . ' + 7 days'));

// Untuk tampilan nomor pendaftaran (Kita tetap tampilkan NOID sebagai REG ID)
$reg_number = $noid_pendaftar;

// URL WhatsApp sudah saya perbaiki ke nomor yang Anda berikan
$whatsapp_message = "Assalamu'alaikum, saya " . $data_pendaftar['nama'] . " sudah melakukan pembayaran DP (" . $formatted_biaya_dp . ") untuk pendaftaran Umroh dengan No. REG-" . $reg_number . ". Paket: " . $nama_paket_terpilih;
$encoded_whatsapp_message = urlencode($whatsapp_message);

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran | UmrohGo Travel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            padding-top: 70px;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 2px solid #d4af37;
        }

        .navbar-brand {
            color: #d4af37 !important;
            font-weight: 600;
        }

        .confirmation-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 60px;
        }

        .header-title {
            color: #d4af37;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-title i {
            margin-right: 10px;
        }

        .detail-group {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item strong {
            color: #333;
            font-weight: 600;
        }

        .detail-item span {
            color: #777;
            font-weight: 500;
        }

        .alert-info-custom {
            background-color: #fff3cd;
            color: #856404;
            border-color: #ffeeba;
            font-size: 1rem;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .alert-success-custom {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 15px;
        }

        .bank-details {
            margin-top: 30px;
            text-align: center;
        }

        .bank-box {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .bank-box h5 {
            color: #333;
            font-weight: 700;
        }

        .bank-box p {
            font-size: 1.2rem;
            color: #555;
            font-weight: 600;
        }

        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            font-weight: 600;
            margin-top: 25px;
            padding: 12px 30px;
        }

        .btn-whatsapp:hover {
            background-color: #128C7E;
            color: white;
        }

        /* Gaya baru untuk tombol kembali */
        .btn-back {
            background-color: #6c757d;
            color: white;
            font-weight: 600;
            margin-top: 20px;
            padding: 10px 25px;
            transition: background 0.2s;
        }

        .btn-back:hover {
            background-color: #5a6268;
            color: white;
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
        </nav>
    </header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="confirmation-box">
                    <h1 class="text-center header-title"><i class="fas fa-check-circle"></i> Pendaftaran Berhasil!</h1>
                    <p class="text-center lead text-success">Langkah selanjutnya adalah menyelesaikan pembayaran Down
                        Payment (DP).</p>
                    <hr>

                    <div class="alert alert-info-custom text-center">
                        **Batas Waktu Pembayaran DP:**
                        <br>
                        Selesaikan pembayaran sebelum **<?php echo htmlspecialchars($batas_bayar); ?>**.
                    </div>

                    <h4 class="mt-4 mb-3" style="color:#d4af37;">Detail Pendaftaran:</h4>
                    <div class="detail-group">
                        <div class="detail-item">
                            <span>Nama Pendaftar</span>
                            <strong><?php echo htmlspecialchars($data_pendaftar['nama']); ?></strong>
                        </div>
                        <div class="detail-item">
                            <span>Nomor Pendaftaran (NOID)</span>
                            <strong>REG-<?php echo htmlspecialchars($reg_number); ?></strong>
                        </div>
                        <div class="detail-item">
                            <span>Paket Umroh Terpilih</span>
                            <strong><?php echo htmlspecialchars($nama_paket_terpilih); ?></strong>
                        </div>
                        <div class="detail-item">
                            <span>Total Biaya Paket</span>
                            <strong><?php echo htmlspecialchars($formatted_biaya_total); ?></strong>
                        </div>
                        <div class="detail-item alert-success-custom">
                            <span>**Jumlah Down Payment (DP 30%)**</span>
                            <strong><?php echo htmlspecialchars($formatted_biaya_dp); ?></strong>
                        </div>
                    </div>

                    <div class="bank-details">
                        <h4 style="color:#333;">Transfer Pembayaran Ke Rekening Berikut:</h4>
                        <div class="bank-box">
                            <h5>BANK SYARIAH INDONESIA (BSI)</h5>
                            <p>Nomor Rekening: **7123456789**</p>
                            <p>Atas Nama: **PT. UMROH GO TOUR & TRAVEL**</p>
                        </div>
                        <small class="text-muted">Mohon transfer sesuai dengan nominal DP di atas.</small>
                    </div>

                    <div class="text-center mt-5">
                        <h4 style="color:#d4af37;">Konfirmasi Pembayaran</h4>
                        <p>Setelah transfer, segera konfirmasi pembayaran Anda agar proses *booking* dapat segera
                            diproses oleh tim kami.</p>

                        <a href="https://wa.me/6287720715699?text=<?php echo $encoded_whatsapp_message; ?>"
                            target="_blank" class="btn btn-whatsapp btn-lg">
                            <i class="fab fa-whatsapp"></i> Konfirmasi Sekarang via WhatsApp
                        </a>
                        <p class="mt-3 text-muted">*(Nomor WhatsApp hanya contoh)*</p>
                    </div>

                    <hr class="mt-5 mb-4">

                    <div class="text-center">
                        <a href="beranda.php" class="btn btn-back">
                            <i class="fas fa-home"></i> Kembali ke Beranda Utama
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>