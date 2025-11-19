<?php
// PASTIKAN SCRIPT INI BERADA DI AWAL FILE
// Hapus tag <html>, <head>, dan <body> dari sini, 
// karena harus berada di bawah pemrosesan PHP.

// Fungsi untuk menampilkan alert dan redirect, untuk kemudahan
function display_alert_redirect($message, $location = 'index.php')
{
	echo "<script>
            alert('{$message}'); 
            window.location='{$location}'
          </script>";
	exit(); // Penting untuk menghentikan eksekusi setelah redirect
}

if (isset($_GET['pesan'])) {
	$pesan = $_GET['pesan'];
	if ($pesan == "gagal") {
		display_alert_redirect('Username dan Password salah');
	} else if ($pesan == "logout") {
		display_alert_redirect('Anda Telah Berhasil Logout');
	} else if ($pesan == "belum_login") {
		display_alert_redirect('Anda harus login untuk akses halaman admin');
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login Admin</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="../css/login.css" rel="stylesheet">

	<style>
		/* CSS Tambahan agar Login Box Rapi di Tengah */
		body {
			background-color: #f8f9fa;
			/* Warna latar belakang ringan */
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			margin: 0;
			padding-top: 40px;
			padding-bottom: 40px;
		}

		form {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: auto;
			background: #fff;
			border-radius: 8px;
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
		}

		.form-control {
			margin-bottom: 10px;
		}

		.btn-primary {
			background-color: #d4af37;
			/* Menggunakan warna emas yang konsisten */
			border-color: #d4af37;
		}

		.btn-primary:hover {
			background-color: #b89630;
			border-color: #b89630;
		}
	</style>
</head>

<body class="text-center">

	<form class="form-signin" action="../login.php" method="post">
		<img class="mb-4" src="../img/logo.png" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>

		<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required
			autofocus>

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
		<p class="mt-5 mb-3 text-muted">© 2025 UmrohGo</p>
	</form>



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