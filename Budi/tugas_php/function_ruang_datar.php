<?php 

	function luas_persegi_panjang($p, $l){
		$Lpp = $p * $l;
		echo "$p * $l = $Lpp";
	}
	luas_persegi_panjang(8, 4);
	echo "<hr>";

	function luas_persegi($s, $s){
		$Lp = $s * $s;
		echo "$s * $s = $Lp";
	}
	luas_persegi(5, 5);
	echo "<hr>";

	function luas_jajar_genjang($a, $t){
		$Ljg = $a * $t;
		echo "$a * $t = $Ljg";
	}
	luas_jajar_genjang(9, 6);
	echo "<hr>";

	function volume_bangun_kubus($s, $s, $s){
		$vk = $s * $s * $s;
		echo "$s * $s * $s = $vk";
	}
	volume_bangun_kubus(4, 4, 4);
	echo "<hr>";

	function volume_bangun_balok($p, $l, $t){
		$vbb = $p * $l * $t;
		echo "$p * $t * $l = $vbb";
	}
	volume_bangun_balok(8, 5, 5);
	echo "<hr>";
?>