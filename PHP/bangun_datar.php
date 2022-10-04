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
$alas = 12;
$tinggi = 10;

echo "1. MENGHITUNG LUAS SEGITIGA <br> <br>";
echo "Rumus  : L = ½ * alas * tinggi <br>";
$luas = 1/2 * $alas * $tinggi;
echo "Alas   = $alas cm <br>";
echo "Tinggi = $tinggi cm <br>";
echo "Hitung  : ½ * $alas * $tinggi <br>";
echo "Hasil = $luas cm²";

echo "<br>";
echo "<br>";

// NOMOR 2
$jari    = 28;
$phi     = 22/7;

echo "2. MENGHITUNG KELILING LINGKARAN <br> <br>";
echo "Rumus  :  K = 2 x π x r <br>";
echo "Keliling = 28 cm <br>";
echo "Phi = 22/7 <br>";
$keliling = 2 * $phi * $jari ;
echo "Hitung  : 2 x 22/7 * 28 <br>";
echo "Hasil = $keliling cm";

echo "<br>";
echo "<br>";

//NOMOR 3
$panjang1 = 8;
$lebar1 = 4;

echo "3. MENGHITUNG KELILING PERSEGI PANJANG <br> <br>";
echo "Rumus  :  2 * (panjang + lebar) <br>";
echo "Panjang = 8 cm <br>";
echo "Lebar = 4 cm <br>";
$total1 = 2 * ($panjang1 + $lebar1);
echo "Hitung : 2 * (8 + 4) <br>";
echo "Hasil = $total1 cm";

echo "<br>";
echo "<br>";

// NOMOR 4
$panjang = 3;
$lebar = 3;

echo "4. MENGHITUNG LUAS PERSEGI <br> <br>";
echo "Rumus  : L = (panjang x lebar) <br>";
echo "Panjang = 3 cm <br>";
echo "Lebar = 3 cm <br>";
$total = $panjang * $lebar;
echo "Hitung : (3 x 3) <br>";
echo "Hasil = $total cm²";

echo "<br>";
echo "<br>";


// NOMOR 5
$s1= 30;
$s2 = 20;
$tinggi_trap = 10;

echo "5. MENGHITUNG LUAS TRAPESIUM <br> <br>";
echo "Rumus  : L = ½ x (s1 + s2) x t <br>";
echo "Sisi bawah (s1) = 30 cm <br>";
echo "Sisi atas (s2) = 20 cm <br>";
echo "Tinggi (t) = 10 cm <br>";
$luas_trap = 1/2 * ($s1 + $s2) * $tinggi_trap ;
echo "Hitung : 1/2 * (30 + 20) * 10 <br>";
echo "Hasil = $luas_trap cm²";

echo "<br>";
echo "<br>";



?>
    
</body>
</html>


