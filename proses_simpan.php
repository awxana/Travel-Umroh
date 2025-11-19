<?php
// Pastikan file koneksi.php ada dan berfungsi
include "koneksi.php";

// Fungsi untuk membersihkan dan mengamankan input
function clean_input($data)
{
	global $koneksi;
	// Pengecekan jika koneksi belum ada, meskipun seharusnya sudah di include
	if (!$koneksi) {
		return $data;
	}
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($koneksi, $data);
	return $data;
}

// Ambil dan bersihkan data dari POST
$paket = clean_input($_POST['paket']);
$noid = clean_input($_POST['noid']); // <-- Kunci Unik: Nomor KTP/SIM
$nama = clean_input($_POST['nama']);
$alamat = clean_input($_POST['alamat']);
$kota = clean_input($_POST['kota']);
$kode = clean_input($_POST['kode']);
$tempat = clean_input($_POST['tempat']);
$ttl = clean_input($_POST['ttl']);
$jenis = clean_input($_POST['jenis1']); // Sesuai dengan name input jenis1 di form
$no = clean_input($_POST['no']);
$email = clean_input($_POST['email']);
$nopaspor = clean_input($_POST['nopaspor']);

// Menentukan tanggal daftar saat ini, yang akan disimpan di kolom 'deadline'
$tgl_daftar = date('Y-m-d');

// Query INSERT data ke tabel 'data'
$query_insert = "INSERT INTO data (paket, noid, nama, alamat, kota, kode, tempat, ttl, jenis, no, email, nopaspor, deadline) 
                 VALUES ('$paket', '$noid', '$nama', '$alamat', '$kota', '$kode', '$tempat', '$ttl', '$jenis', '$no', '$email', '$nopaspor', '$tgl_daftar')";

$sql_insert = mysqli_query($koneksi, $query_insert);

if ($sql_insert) {
	// KOREKSI PENTING: Menggunakan $noid sebagai ID pendaftar untuk redirect
	$id_pendaftar = $noid;

	// REDIRECT ke halaman konfirmasi pembayaran dengan membawa NOID
	header("Location: konfirmasi_pembayaran.php?id_pendaftar=" . urlencode($id_pendaftar));
	exit();
} else {
	// Jika terjadi error (misal NOID duplikat, kolom salah, atau koneksi mati)
	echo "Pendaftaran Gagal. Error SQL: " . mysqli_error($koneksi);
	echo '<br>Cek apakah NOID yang Anda masukkan sudah terdaftar atau ada kesalahan pada nama kolom.';
	echo '<br><a href="daftar.php">Kembali ke Formulir Pendaftaran</a>';
}

mysqli_close($koneksi);
?>