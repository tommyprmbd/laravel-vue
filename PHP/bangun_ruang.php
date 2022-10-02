<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// NOMOR 1
$panjang = 14;
$lebar   = 10;
$tinggi  = 8;

echo "1. MENGHITUNG VOLUME BALOK <br> <br>";
echo "Volume Balok = p x l x t <br>";
$volumeBalok = $panjang * $lebar * $tinggi;
echo "panjang = $panjang cm <br>";
echo "lebar   = $lebar cm <br>";
echo "Tinggi = $tinggi cm <br>";
echo "Hitung  : $panjang * $lebar * $tinggi <br>";
echo "Hasil = $volumeBalok cm³";

echo "<br>";
echo "<br>";


// NOMOR 2
$rusuk1 = 8;
$rusuk2  = 8;
$rusuk3  = 8;

echo "2. MENGHITUNG VOLUME KUBUS <br> <br>";
echo "Volume Kubus = rusuk x rusuk x rusuk (R³ rusuk/sisi) <br>";
$volumeKubus = $rusuk1 * $rusuk2 * $rusuk3;
echo "sisi1 = $rusuk1 cm <br>";
echo "sisi2   = $rusuk2 cm <br>";
echo "sisi3 = $rusuk3 cm <br>";
echo "Hitung  : $rusuk1 * $rusuk2 * $rusuk3 <br>";
echo "Hasil = $volumeKubus cm³";

echo "<br>";
echo "<br>";

// NOMOR 3
$tinggi = 35;
$phi   = 22/7;
$jari  = 21;

echo "3. MENGHITUNG VOLUME KERUCUT <br> <br>";
echo "Volume Kerucut = 1/3 x π x r² x t <br>";
$volumeKerucut = 1/3 * 22/7 * 21 * 21 * 35;
echo "Tinggi = $tinggi cm <br>";
echo "jari-jari = $jari cm <br>";
echo "phi = 22/7 <br>";
echo "Hitung  : 1/3 x 22/7 x 21cm x 21cm x 35cm <br>";
echo "Hasil = $volumeKerucut cm³";

echo "<br>";
echo "<br>";


?>
</body>
</html>