<?php 
	$array = file_get_contents("data.json");
	$data = json_decode($array, true);

	echo "<div style = 'background-color: orange; font-size: 20px; width : 98.5%; height : 20px; padding: 10px;' ><b>Daftar Nilai</b></div>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<center>";
	echo "<table border = 1>";
	echo "<tr>";
	echo "<td style = 'padding:5px;'><b>No.</b></td>";
	echo "<td style = 'padding:5px;'<b>Nama</b></td>";
	echo "<td style = 'padding:5px;'><b>Tanggal Lahir</b></td>";
	echo "<td style = 'padding:5px;'><b>Umur</b></td>";
	echo "<td style = 'padding:5px;'><b>Alamat</b></td>";
	echo "<td style = 'padding:5px;'><b>Kelas</b></td>";
	echo "<td style = 'padding:5px;'><b>Nilai</b></td>";
	echo "<td style = 'padding:5px;'><b>Hasil</b></td>";
	echo "</tr>";
	foreach ($data as $key => $value) {
		$today = date("Y-m-d");
		$age = date_diff(date_create($value['tanggal_lahir']), date_create($today));
		if ($value['nilai'] >= 85) {
			$result = "A";
		} elseif ($value['nilai'] < 50) {
			$result = "E";
		} elseif ($value['nilai'] >= 80 && $value['nilai'] < 85) {
			$result = "A-";
		} elseif ($value['nilai'] >= 75 && $value['nilai'] < 80) {
			$result = "B+";
		} elseif ($value['nilai'] >= 70 && $value['nilai'] < 75) {
			$result = "B";
		} elseif ($value['nilai'] >= 65 && $value['nilai'] < 70) {
			$result = "B-";
		} elseif ($value['nilai'] >= 60 && $value['nilai'] < 65) {
			$result = "C+";
		} elseif ($value['nilai'] >= 55 && $value['nilai'] < 60) {
			$result = "C";
		} elseif ($value['nilai'] >= 50 && $value['nilai'] < 55) {
			$result = "D";
		} else {
			$result = "";
		}
		
		echo "<tr>";
		echo "<td style = 'padding:5px;'>".($key+1)."</td>";
		echo "<td style = 'padding:5px;'>".$value['nama']."</td>";
		echo "<td style = 'padding:5px;'>".$value['tanggal_lahir']."</td>";
		echo "<td style = 'padding:5px;'>".$age->format('%y')." tahun </td>";
		echo "<td style = 'padding:5px;'>".$value['alamat']."</td>";
		echo "<td style = 'padding:5px;'>".$value['kelas']."</td>";
		echo "<td style = 'padding:5px;'>".$value['nilai']."</td>";
		echo "<td style = 'padding:5px;'>".$result."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
 ?>