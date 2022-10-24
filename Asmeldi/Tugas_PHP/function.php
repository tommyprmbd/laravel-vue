<?php

function persegiPanjang($luas, $panjang)
{
    //luas persegi panjang
    $lpp = $luas * $panjang;
    echo "<b>Rumus Persegi Panjang</b><br><br>";
    echo "Lebar = $luas <br>";
    echo "Panjang = $panjang <br>";
    echo "Luas Persegi Panjang <br>";
    echo "$luas * $panjang = $lpp";
    echo "<hr>";
}
persegiPanjang(20, 40);


function persegi($sisi = 10)
{
    //luas Persegi
    $sisi = 10;
    $lp = $sisi ** 2;
    echo "<b>Rumus Persegi</b><br><br>";
    echo "Sisi = $sisi <br>";
    echo "Luas Persegi <br>";
    echo "$sisi * $sisi = $lp";
    echo "<hr>";
}

persegi();



function jajarGenjang($alas, $tinggi)
{
    //Luas Bangun Jajar genjang

    $jajarGenjang = $alas * $tinggi;
    echo "<b>Rumus Luas Bangun Jajar genjang</b><br><br>";
    echo "alas = $alas <br>";
    echo "tinggi = $tinggi <br>";
    echo "Luas Bangun Jajar genjang <br>";
    echo "$alas * $tinggi = $jajarGenjang";
    echo "<hr>";
}

jajarGenjang(10, 30);



function Lingkaran($ruas = 4)
{

    //luas Lingkaran
    $ll = 3.14 * $ruas ** 2;
    echo "<b>Rumus Lingkaran</b><br><br>";
    echo "Jari-jari = $ruas <br>";
    echo "Luas Lingkaran <br>";
    echo "3.14 * $ruas * $ruas = $ll";
    echo "<hr>";
}

Lingkaran();



function Trapesium($at, $b, $tt)
{

    //luas Trapesium

    $lt = (($at + $b) * $tt) / 2;
    echo "<b>Rumus Trapesium</b><br><br>";
    echo "Sisi atas = $at <br>";
    echo "Sisi bawah = $b <br>";
    echo "Tinggi = $tt <br>";
    echo "Luas Trapesium <br>";
    echo "(($at + $b) * $tt)/2 = $lt";
    echo "<hr>";
}

Trapesium(15, 8, 10);
