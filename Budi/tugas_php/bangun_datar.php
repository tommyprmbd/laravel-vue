<?php
$p = 8; //panjang
$l = 4; // lebar
$s = 5; // sisi
$a = 9; //alas
$t = 6; //tinggi
$d1 = 16; //diagonal1
$d2 = 8; //diagonal2

//luas persegi panjang
$Lpp = $p * $l;
echo "$p * $l = $Lpp";
echo "<hr>";

//luas persegi
$Lp = $s * $s;
echo "$s * $s = $Lp";
echo "<hr>";

//luas jajar genjang
$Ljg = $a * $t;
echo "$a * $t = $Ljg";
echo "<hr>";

//luas belah ketupat
$Lbk = 0.5 * $d1 * $d2;
echo "0.5 * $d1 * $d2 = $Lbk";
echo "<hr>";

//luas bangun layang- layang
$Lbll = 0.5 * $d1 * $d2;
echo "0.5 * $d1 * $d2 = $Lbll";
echo "<hr>";

?>