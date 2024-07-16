<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Metode MOORA WASPAS</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
<h4>Hasil Akhir Perankingan MOORA</h4>
<table border="1" width="100%">
	<thead>
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

<h4>Hasil Akhir Perankingan WASPAS</h4>
<table border="1" width="100%">
	<thead>
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
<script>
	window.print();
</script>
</body>
</html>