<?php
session_start();

// 1. MEMBUAT KONEKSI (DIPERBAIKI DENGAN PENANGANAN ERROR)
$conn = new mysqli('localhost', 'root', '', 'datajamah');

// Cek koneksi
if ($conn->connect_error) {
	die("Koneksi Database Gagal: " . $conn->connect_error);
}

// Cek apakah data POST ada
if (!isset($_POST['username']) || !isset($_POST['password'])) {
	header("Location: admin/index.php?pesan=error_form");
	exit();
}

// 2. AMBIL DATA DARI FORM
$username_input = $_POST['username'];
$password_input = $_POST['password'];

// 3. MENGGUNAKAN PREPARED STATEMENT (DENGAN PERBAIKAN DI SINI)
// Hapus kolom 'level' dari SELECT statement
$stmt = $conn->prepare("SELECT username, password FROM login WHERE username = ? AND password = ?");

// Cek apakah prepare query berhasil
if ($stmt === false) {
	// Jika terjadi kesalahan lain (bukan error 'level'), akan ditampilkan
	die("Error preparing statement: " . $conn->error);
}

// Binding parameter: 'ss' berarti dua parameter berikutnya adalah string (s)
$stmt->bind_param("ss", $username_input, $password_input);

// Jalankan query
$stmt->execute();

// Ambil hasil
$result = $stmt->get_result();

// 4. PROSES HASIL
$num = $result->num_rows;

if ($num > 0) {
	// Jika data ditemukan
	$data_user = $result->fetch_assoc();

	// 5. PENETAPAN SESSION YANG BENAR
	$_SESSION['username'] = $data_user['username'];
	$_SESSION['status'] = "login";

	// Karena kolom 'level' sudah dihapus, kita asumsikan semua yang berhasil login adalah admin
	header("location:admin/admin.php");

} else {
	// Jika login gagal
	header("Location: admin/index.php?pesan=gagal");
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();

exit();
?>