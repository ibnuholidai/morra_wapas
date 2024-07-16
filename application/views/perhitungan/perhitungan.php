<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan
	<?php if (isset($_POST['hitung'])) {if($_POST['metode'] == "moora") {echo "MOORA";}}?>
	<?php if (isset($_POST['hitung'])) {if($_POST['metode'] == "waspas") {echo "WASPAS";}}?>
	</h1>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Hitung Berdasarkan Metode</h6>
	</div>

	<div class="card-body">
		<form action="<?= base_url('Perhitungan'); ?>" method="POST">
			<div class="row">
				<div class="input-group mb-3 col-10">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Pilih Metode</label>
					</div>
					<select name="metode" class="custom-select" required>
						<option value="">--Pilih Metode Perhitungan--</option>
						<option value="moora" <?php if (isset($_POST['hitung'])) {if($_POST['metode'] == "moora") {echo "selected";}}?>>Perhitungan Metode MOORA</option>
						<option value="waspas" <?php if (isset($_POST['hitung'])) {if($_POST['metode'] == "waspas") {echo "selected";}}?>>Perhitungan Metode WASPAS</option>
					</select>
				</div>

				<div class="col-2">
					<button name="hitung" type="submit" class="btn btn-primary w-100"><i class="fa fa-search"></i> Hitung</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
	if (isset($_POST['hitung'])) {
		if($_POST['metode'] == "moora") {
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai'];
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Ternormalisasi (R)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php
							foreach ($kriteria as $key){
								$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
								$data_pangkat = $this->Perhitungan_model->get_total_pangkat($key->id_kriteria);
								
								$n = $data_pencocokan['nilai']/sqrt($data_pangkat['nilai']);
								$nh = round($n,4);
								echo "<td>".$nh."</td>";
							}
						?>
					</tr>
					<?php
						$no++;
						endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Normalisasi Terbobot</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php
							foreach ($kriteria as $key){
								$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
								$data_pangkat = $this->Perhitungan_model->get_total_pangkat($key->id_kriteria);
								$bobot = $key->bobot;
								
								$hs = $bobot*($data_pencocokan['nilai']/sqrt($data_pangkat['nilai']));
								$hsl = round($hs,4);
								echo "<td>".$hsl."</td>";
							}
						?>
					</tr>
					<?php
						$no++;
						endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Menghitung Nilai Yi</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						
						<th>Maximun (
						<?php foreach ($maximum as $max){ ?>
							<?= $max->kode_kriteria ?>
						<?php } ?>
						)</th>
						
						<th>Minimum (
						<?php foreach ($minimum as $min){ ?>
							<?= $min->kode_kriteria ?>
						<?php } ?>
						)</th>
						<th>Yi = Max - Min</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$this->Perhitungan_model->hapus_hasil_moora();
						$no=1;
						$nilai_max = 0;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<td>
                        <?php
							$data_maximum = $this->Perhitungan_model->data_max($keys->id_alternatif);
							echo round($data_maximum['nilai'],4);
						?>
						</td>
						<td>
                        <?php
							$data_minimum = $this->Perhitungan_model->data_min($keys->id_alternatif);
							echo round($data_minimum['nilai'],4);
						?>
						</td>
						
						<td>
                        <?php
							$total_hasil = $data_maximum['nilai']-$data_minimum['nilai'];
							echo round($total_hasil,4);
							$hasil_akhir = [
								'id_alternatif' => $keys->id_alternatif,
								'nilai' => round($total_hasil,4)
							];
							$this->Perhitungan_model->insert_hasil_moora($hasil_akhir);
						?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php
	}elseif($_POST['metode'] == "waspas") {
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							echo $data_pencocokan['nilai'];
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Matriks Ternormalisasi (R)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							if($min_max['jenis']=='Benefit'){
								echo @(round($data_pencocokan['nilai']/$min_max['max'],4));
							}else{
								echo @(round($min_max['min']/$data_pencocokan['nilai'],4));								
							}
						?>
						</td>
						<?php endforeach ?>
					</tr>
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Bobot Preferensi (W)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<?php foreach ($kriteria as $key): ?>
						<th><?= $key->kode_kriteria ?> (<?= $key->jenis ?>)</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php foreach ($kriteria as $key): ?>
						<td>
						<?php 
						echo $key->bobot;
						?>
						</td>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perhitungan Nilai Qi</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Alternatif</th>
						<th width="15%">Nilai Qi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$this->Perhitungan_model->hapus_hasil_waspas();
						$no=1;
						foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?= $no; ?></td>
						<td align="left"><?= $keys->nama ?></td>
						<?php 
						$ta = 0;
						$pa = 1;
						foreach ($kriteria as $key){ ?>
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
							$min_max=$this->Perhitungan_model->get_max_min($key->id_kriteria);
							
							if($min_max['jenis']=='Benefit'){
								$p = @(round($data_pencocokan['nilai']/$min_max['max'],4));
							}else{
								$p = @(round($min_max['min']/$data_pencocokan['nilai'],4));
							}
						$bobot=$key->bobot;
						$ta += $p*$bobot;
						$pa *= pow($p,$bobot);
						$total_hasil=(0.5*$ta)+(0.5*$pa);
						}
						$hasil_akhir = [
							'id_alternatif' => $keys->id_alternatif,
							'nilai' => round($total_hasil,4)
						];
						$result = $this->Perhitungan_model->insert_hasil_waspas($hasil_akhir);
						?>
						<td>
						<?= round($total_hasil,4); ?>
						</td>
					</tr>
					<?php
						$no++;
						endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
	}
}
$this->load->view('layouts/footer_admin');
?>