<?php 
	//luas Persegi
	$s = 4;
	$lp = $s ** 2;
	echo "<b>Persegi</b><br><br>"; 
	echo "Sisi = $s <br>";
	echo "Luas Persegi <br>";
	echo "$s * $s = $lp";
	echo "<hr>";

	//luas persegi panjang
	$l = 5;
	$p = 10;
	$lpp = $l * $p;
	echo "<b>Persegi Panjang</b><br><br>"; 
	echo "Lebar = $l <br>";
	echo "Panjang = $p <br>";
	echo "Luas Persegi Panjang <br>";
	echo "$l * $p = $lpp";
	echo "<hr>";

	//luas segitiga
	$as = 2;
	$ts = 6;
	$ls = ($as * $ts)/2;
	echo "<b>Segitiga</b><br><br>"; 
	echo "Alas = $as <br>";
	echo "Tinggi = $ts <br>";
	echo "Luas Segitiga <br>";
	echo "($as * $ts)/2 = $ls";
	echo "<hr>";

	//luas Lingkaran
	$r = 2;
	$ll = 3.14 * $r ** 2;
	echo "<b>Lingkaran</b><br><br>"; 
	echo "Jari-jari = $r <br>";
	echo "Luas Lingkaran <br>";
	echo "3.14 * $r * $r = $ll";
	echo "<hr>";

	//luas Trapesium
	$at = 7;
	$b = 3;
	$tt = 5;
	$lt = (($at + $b) * $tt)/2;
	echo "<b>Trapesium</b><br><br>"; 
	echo "Sisi atas = $at <br>";
	echo "Sisi bawah = $b <br>";
	echo "Tinggi = $tt <br>";
	echo "Luas Trapesium <br>";
	echo "(($at + $b) * $tt)/2 = $lt";
	echo "<hr>";
 ?>