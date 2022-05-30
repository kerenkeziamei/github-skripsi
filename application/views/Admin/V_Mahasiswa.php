<h1>Data Mahasiswa</h1>
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Mahasiswa Perwalian</h4>
				<div class="table-responsive">
					<table class="table table-dark">
						<thead>
							<tr>
								<th style="color: white;"> NIM </th>
								<th style="color: white;"> Nama </th>
								<th style="color: white;"> Angkatan </th>
								<th style="color: white;"> Email </th>
								<th style="color: white;"> Aksi </th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($mahasiswa as $row) : ?>
								<tr>
									<td style="color: white;"><?= $row->nim ?> </td>
									<td style="color: white;"><?= $row->username ?></td>
									<td style="color: white;"><?= $row->angkatan ?></td>
									<td style="color: white;"><?= $row->email ?></td>
									<!-- <td><a href="<?php echo base_url('/Admin/Mahasiswa/ViewTambah/' . $row->nim) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a></td> -->
									<td style="color: white;">
									<a type="button" href="<?= base_url().'admin/Mahasiswa/delete/'.$row->nim ?>" class="btn btn-danger btn-icon-text"><i class="mdi mdi-upload btn-icon-prepend"></i> Delete </a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
