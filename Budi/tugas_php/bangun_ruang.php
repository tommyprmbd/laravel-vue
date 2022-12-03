<?php
$s = 4; //sisi
$p = 8; //panjang
$t = 5; //tinggi
$l = 5; //lebar
$r = 3; //jari-jari

//volume bangun kubus
$vk = $s * $s * $s;
echo "$s * $s * $s = $vk";
echo "<hr>";

//volume bangun balok
$vbb = $p * $l * $t;
echo "$p * $t * $l = $vbb";
echo "<hr>";

//volume bangun kerucut
$vbc = 0.33 * 3.14 * $r * $r * $t;
echo "0.33 * 3.14 * $r * $r * $t = $vbc";
echo "<hr>";
?>