<?php 
	// Rumus menghitung volume kubus
	function volume_kubus ($s){
		$vk = $s ** 3;
		echo "<b>Menghitung Volume Kubus</b><br><br>"; 
		echo "Sisi = $s <br>";
		echo "Volume Kubus <br>";
		echo "$s * $s * $s = $vk";
		echo "<hr>";
	}

	// Rumus menghitung volume balok
	function volume_balok ($l, $p, $tb){
		$vb = $l * $p * $tb;
		echo "<b>Menghitung Volume Balok</b><br><br>"; 
		echo "Lebar = $l <br>";
		echo "Panjang = $p <br>";
		echo "Tinggi = $tb <br>";
		echo "Volume Balok <br>";
		echo "$l * $p * $tb = $vb";
		echo "<hr>";
	}

	// Rumus menghitung volume tabung
	function volume_tabung ($r, $tt){
		$vt = 3.14 * $r * $tt;
		echo "<b>Menghitung Volume Tabung</b><br><br>"; 
		echo "Jari-jari = $r <br>";
		echo "Tinggi = $tt <br>";
		echo "Volume Tabung <br>";
		echo "3.14 * $r * $tt = $vt";
		echo "<hr>";
	}

	// Rumus menghitung luas segitiga
	function luas_segitiga ($as, $ts){
		$ls = ($as * $ts)/2;
		echo "<b>Menghitung Luas Segitiga</b><br><br>"; 
		echo "Alas = $as <br>";
		echo "Tinggi = $ts <br>";
		echo "Luas Segitiga <br>";
		echo "($as * $ts)/2 = $ls";
		echo "<hr>";
	}

	// Rumus menghitung luas trapesium
	function luas_trapesium ($at, $b, $tt){
		$lt = (($at + $b) * $tt)/2;
		echo "<b>Menghitung Luas Trapesium</b><br><br>"; 
		echo "Sisi atas = $at <br>";
		echo "Sisi bawah = $b <br>";
		echo "Tinggi = $tt <br>";
		echo "Luas Trapesium <br>";
		echo "(($at + $b) * $tt)/2 = $lt";
		echo "<hr>";
	}

	volume_kubus (10);
	volume_balok (10, 20, 15);
	volume_tabung (5, 30);
	luas_segitiga (10, 5);
	luas_trapesium (10, 20, 25);
?>