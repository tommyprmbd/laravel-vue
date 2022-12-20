<?php 

	function luas_persegi_panjang($p, $l){
		$Lpp = $p * $l;
		echo "$p * $l = $Lpp";
	}
	luas_persegi_panjang(8, 4);
	echo "<hr>";


	function luas_persegi($Spi, $Si){
		$Lp = $Spi * $Si;
		echo "$Spi * $Si = $Lp";
	}
	luas_persegi(5, 5);
	echo "<hr>";


	function luas_jajar_genjang($a, $t){
		$Ljg = $a * $t;
		echo "$a * $t = $Ljg";
	}
	luas_jajar_genjang(9, 6);
	echo "<hr>";


	function volume_bangun_kubus($Sa, $Sb, $Sc){
		$vk = $Sa * $Sb * $Sc;
		echo "$Sa * $Sb * $Sc = $vk";
	}
	volume_bangun_kubus(4, 4, 4);
	echo "<hr>";


	function volume_bangun_balok($pb, $lb, $tb){
		$vbb = $pb * $lb * $tb;
		echo "$pb * $lb * $tb = $vbb";
	}
	volume_bangun_balok(8, 5, 5);
	echo "<hr>";
?>