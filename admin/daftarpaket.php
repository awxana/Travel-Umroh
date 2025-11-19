<?php
include 'akses.php';
include 'koneksi.php';

if (empty($_SESSION['username'])) {
	header("location:index.php?pesan=belum_login");
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Data Paket Umroh</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

	<style>
		body {
			background: #f8f9fa;
		}

		.table th,
		.table td {
			vertical-align: middle !important;
			text-align: center;
		}

		/* ===== GAYA EMAS PUTIH (Gold-White Style) ===== */
		.card-gold {
			background: white;
			border-radius: 14px;
			padding: 25px;
			margin-top: 20px;
			border: 1px solid #e6d8b8;
			box-shadow: 0 5px 12px rgba(0, 0, 0, 0.06);
		}

		.card-gold h3 {
			color: #7a5a17;
			font-weight: bold;
			margin-bottom: 20px;
			display: flex;
			align-items: center;
			gap: 10px;
		}

		/* ===== DATATABLES CONTROL ===== */
		#tabel-data_wrapper .dataTables_filter input,
		#tabel-data_wrapper .dataTables_length select {
			border: 1px solid #d7c49a;
			border-radius: 6px;
			padding: 4px 6px;
		}

		/* ===== TABEL ===== */
		table thead {
			background: #f8f1df;
			color: #7a5a17;
			font-weight: 700;
		}

		table thead th {
			border-right: 1px solid #d7c49a;
		}

		table thead th:last-child {
			border-right: none;
		}

		table tbody tr:hover {
			background: #f5efe3 !important;
			transition: 0.2s;
		}

		/* ===== BUTTON EDIT & HAPUS ===== */
		.btn-edit {
			background: #b68832;
			border: none;
			color: white;
			padding: 6px 12px;
			border-radius: 6px;
			font-weight: bold;
			text-decoration: none;
			font-size: 0.875rem;
		}

		.btn-edit:hover {
			background: #8e6926;
		}

		.btn-delete {
			background: #c0392b;
			border: none;
			color: white;
			padding: 6px 12px;
			border-radius: 6px;
			text-decoration: none;
			font-size: 0.875rem;
		}

		.btn-delete:hover {
			background: #992d22;
		}

		.aksi-container {
			display: flex;
			gap: 5px;
			justify-content: center;
		}

		.table-responsive {
			margin-top: 15px;
		}
	</style>
</head>

<body>

	<!-- ===== CONTENT ===== -->
	<div class="container mt-4">

		<div class="card-gold">
			<h3><i class="bi bi-airplane-fill"></i> Data Paket Umroh</h3>

			<div class="table-responsive">
				<table id="tabel-data" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id Paket</th>
							<th>Nama Paket</th>
							<th>Durasi</th>
							<th>Keberangkatan</th>
							<th>Hotel Mekkah</th>
							<th>Hotel Madinah</th>
							<th>Biaya</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = mysqli_query($koneksi, "SELECT * FROM data_paket");
						if (!$query) {
							echo "<tr><td colspan='8' class='text-danger'>QUERY ERROR: " . mysqli_error($koneksi) . "</td></tr>";
						} else {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?= $data['id_paket']; ?></td>
									<td><?= $data['nama_paket']; ?></td>
									<td><?= $data['durasi']; ?></td>
									<td><?= $data['keberangkatan']; ?></td>
									<td><?= $data['hotel_mekkah']; ?></td>
									<td><?= $data['hotel_madinah']; ?></td>
									<td><?= $data['biaya']; ?></td>
									<td>
										<div class="aksi-container">
											<a class="btn-edit" href="editpaket.php?id_paket=<?= $data['id_paket']; ?>">Edit</a>
											<a class="btn-delete"
												href="proses_hapus_paket.php?id_paket=<?= $data['id_paket']; ?>"
												onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
										</div>
									</td>
								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>

		</div>
	</div>

	<!-- ===== SCRIPTS ===== -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function () {
			$('#tabel-data').DataTable();
		});
	</script>

</body>

</html>