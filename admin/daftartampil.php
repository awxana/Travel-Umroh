<?php
// HAPUS SEMUA: session_start(), header location, include "koneksi.php";
// KARENA SUDAH DISEDIAKAN OLEH admin.php

// Anda hanya perlu menyertakan koneksi jika diperlukan, tetapi jika sudah ada di admin.php, HILANGKAN:
if (!isset($koneksi)) {
	include "koneksi.php";
}
?>

<style>
	/* HANYA SIMPAN STYLE TERKAIT TABEL DAN CARD */
	.card-gold {
		background: white;
		border-radius: 18px;
		padding: 28px;
		margin-top: 25px;
		border: 1px solid #e8d9b9;
		box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
	}

	.card-gold h3 {
		color: #7a5a17;
		font-weight: 800;
		font-size: 22px;
		display: flex;
		align-items: center;
		gap: 10px;
	}

	/* TABLE */
	table thead {
		background: #f8f1df;
		color: #7a5a17;
		font-weight: 700;
	}

	/* ... styling tabel lainnya ... */
	#tabel-data {
		border: 1px solid #e8d9b9 !important;
		border-radius: 14px;
		overflow: hidden;
		background: white;
	}

	#tabel-data tbody td {
		padding: 10px 12px;
		color: #5b4a1e;
		font-size: 14px;
		border-color: #ecdcbc !important;
	}

	/* ... Semua styling lain yang tidak bentrok dengan admin.php ... */

	/* BUTTONS */
	.btn-edit {
		background: #b68832;
		border: none;
		color: white;
		padding: 5px 10px;
		border-radius: 8px;
		font-weight: 600;
		font-size: 13px;
		text-decoration: none;
		display: inline-flex;
		align-items: center;
		gap: 5px;
	}

	.btn-delete {
		background: #c0392b;
		border: none;
		color: white;
		padding: 5px 10px;
		border-radius: 8px;
		font-weight: 600;
		font-size: 13px;
		text-decoration: none;
		display: inline-flex;
		align-items: center;
		gap: 5px;
	}
</style>

<div class="card-gold">
	<h3><i class="bi bi-people-fill"></i> Data Formulir Jamaah</h3>

	<div class="table-responsive">
		<table id="tabel-data" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Paket</th>
					<th>No KTP / SIM</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kodepos</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>No Telepon</th>
					<th>Email</th>
					<th>No Paspor</th>
					<th>Deadline</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
				<?php
				// Jika koneksi sudah ada dari admin.php, tidak perlu include lagi.
				if (!isset($koneksi)) {
					include "koneksi.php"; // Ini hanya jika admin.php tidak include koneksi
				}

				// Pastikan variabel $koneksi tersedia.
				$query = mysqli_query($koneksi, "SELECT * FROM data");

				if (!$query) {
					echo "<tr><td colspan='14' class='text-center text-danger'>Terjadi Kesalahan Database: " . mysqli_error($koneksi) . "</td></tr>";
				} else {
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?= $data['paket']; ?></td>
							<td><?= $data['noid']; ?></td>
							<td><?= $data['nama']; ?></td>
							<td><?= $data['alamat']; ?></td>
							<td><?= $data['kota']; ?></td>
							<td><?= $data['kode']; ?></td>
							<td><?= $data['tempat']; ?></td>
							<td><?= $data['ttl']; ?></td>
							<td><?= $data['jenis']; ?></td>
							<td><?= $data['no']; ?></td>
							<td><?= $data['email']; ?></td>
							<td><?= $data['nopaspor']; ?></td>
							<td><?= $data['deadline']; ?></td>

							<td>
								<div class="aksi-container">
									<a class="btn-edit" href="edit.php?noid=<?= $data['noid']; ?>">
										<i class="bi bi-pencil-square"></i> Edit
									</a>

									<a class="btn-delete" href="proses_hapus.php?noid=<?= $data['noid']; ?>"
										onclick="return confirm('Apakah Anda yakin ingin menghapus data jamaah <?= $data['nama']; ?>?')">
										<i class="bi bi-trash"></i> Hapus
									</a>
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