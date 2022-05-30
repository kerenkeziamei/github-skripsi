<div class="row">
	<div class="col-lg-3 grid-margin stretch-card">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="<?= base_url() ?>/profile/<?= $mahasiswa->profile ?>" alt="Card image cap">
			<form method="post" action="<?= base_url() . 'Dosen/Dashboard/TambahCatatan/' . $mahasiswa->id_perwalian ?>">
				<div class="card-body">
					<h5 class="card-title"><?= $mahasiswa->username ?>,<?= $mahasiswa->nim ?></h5>
					<p class="card-text">Ipk: <?= $mahasiswa->ipk ?></p>
					<p class="card-text">Catatan:</p>
					<?php foreach ($catatan as $row) : ?>

						<p class="card-text">
							<?= $row->catatan ?>
						</p>
					<?php endforeach ?>


					<textarea style="color: white;" class="form-control" name="catatan" rows="4"></textarea>
					<br>
					<button class="btn btn-primary">Tambahkan Catatan</button>
					<p class="card-text"><?= $mahasiswa->catatan ?></p>
					<br>
					<a href="<?= base_url() . 'Dosen/Dashboard/HapusCatatan/' . $mahasiswa->id_perwalian ?>" class="btn btn-danger">Hapus Catatan</a>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-9 grid-margin stretch-card">

		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Daftar Matakuliah</h4>
				</p>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="color: white;"> Kode Matakuliah </th>
								<th style="color: white;"> Nama Matakuliah </th>
								<th style="color: white;"> Kehadiran </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($chart as $val) : ?>
								<tr>
									<td style="color: white;"><?= $val->kode_mk ?> </td>
									<td style="color: white;"><?= $val->nama_mk ?></td>
									<?php if ($val->absensi < 75) { ?>
										<td style="color: white;"><label class="badge badge-danger">Kurang</label></td>
									<?php } else { ?>
										<td style="color: white;"><label class="badge badge-success">Baik</label></td>
									<?php } ?>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
		<?php
		// Inisialisasi nilai variabel awal
		$nama_mk = "";
		$absensi = null;
		foreach ($chart as $item) {
			$nama = $item->nama_mk;
			$nama_mk .= "'$nama'" . ", ";
			$absen = $item->absensi;
			$absensi .= "$absen" . ",";
		}

		?>
	</div>
</div>
<script>
	var xValues = [<?php echo $nama_mk; ?>];
	var yValues = [<?php echo $absensi; ?>];
	var barColors = ["red", "green", "blue", "orange", "brown"];

	new Chart("myChart", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
				backgroundColor: barColors,
				data: yValues
			}]
		},
		options: {
			legend: {
				display: false
			},
			title: {
				display: true,
				text: "World Wine Production 2018"
			}
		}
	});
</script>
