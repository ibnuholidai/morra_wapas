<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
	
	<a href="<?= base_url('Laporan'); ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card shadow mb-4">
			<!-- /.card-header -->
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Hasil Akhir Perankingan MOORA</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead class="bg-primary text-white">
							<tr align="center">
								<th>Alternatif</th>
								<th>Nilai Yi</th>
								<th width="15%">Rank</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no=1;
								foreach ($hasil_moora as $keys): ?>
							<tr align="center">
								<td align="left">
									<?php
									$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
									echo $nama_alternatif['nama'];
									?>
								
								</td>
								<td><?= $keys->nilai ?></td>
								<td><?= $no; ?></td>
							</tr>
							<?php
								$no++;
								endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="card shadow mb-4">
			<!-- /.card-header -->
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Hasil Akhir Perankingan WASPAS</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead class="bg-primary text-white">
							<tr align="center">
								<th>Alternatif</th>
								<th>Nilai Qi</th>
								<th width="15%">Rank</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no=1;
								foreach ($hasil_waspas as $keys): ?>
							<tr align="center">
								<td align="left">
									<?php
									$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
									echo $nama_alternatif['nama'];
									?>
								
								</td>
								<td><?= $keys->nilai ?></td>
								<td><?= $no; ?></td>
							</tr>
							<?php
								$no++;
								endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
$this->load->view('layouts/footer_admin');
?>