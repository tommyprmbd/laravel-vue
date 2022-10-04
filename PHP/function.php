<?php

// MENGHITUNG LUAS SEGITIGA
function menghitungLuasSegitiga(float $angka1, int $angka2, int $angka3) {
    $hasilSegitiga = $angka1 * $angka2 * $angka3;
    echo "Menghitung luas segitiga <br>";
    echo "Rumus : L = ½ * alas * tinggi <br>";
    echo "Hitung : $angka1 x $angka2 x $angka3 = $hasilSegitiga cm²" ;
    echo "<br>";
    echo "<br>";
}

// MENGHITUNG KELILING LINGKARAN
$menghitungKelilingLingkaran = function(int $angka1, float $angka2, int $angka3) {
    $kelilingLingkaran = $angka1 * $angka2 * $angka3;
    echo "Menghitung Keliling Lingkaran <br>";
    echo "Rumus : K = 2 x π x r <br>";
    echo "Hitung : $angka1 x $angka2 x $angka3 = $kelilingLingkaran cm";
    echo "<br>";
    echo "<br>";

};

// MENGHITUNG VOLUME BALOK
function volumeBalok($a, $b, $c)
{
    echo "Menghitung Volume Balok <br>";
    echo "Volume Balok = p x l x t <br>";
    echo "Hitung : 14 x 10 x 8 <br>";
    return $a * $b * $c ;
};


// MENGHITUNG LUAS TRAPESIUM
function menghitungLuasTrapesium(float $angka1, int $angka2, int $angka3, int $angka4) {
    $hasilTrapesium = $angka1 * ($angka2 + $angka3) * $angka4;
    echo "Menghitung luas trapesium <br>";
    echo "Rumus : L = ½ x (s1 + s2) x t <br>";
    echo "Hitung : $angka1 x ($angka2 + $angka3) x $angka4 = $hasilTrapesium cm²" ;

    echo "<br>";
    echo "<br>";
}

// MENGHITUNG LUAS PERSEGI
function luasPersegi($a, $b)
{
    echo "Menghitung Luas Persegi <br>";
    echo "Rumus : L =  panjang x lebar <br>";
    echo "Hitung : 10 x 10 <br>";
    return $a * $b ;
};







menghitungLuasSegitiga(1/2, 12, 10);       // FUNCTION

$menghitungKelilingLingkaran(2, 22/7, 28); // ANONYMOUS FUNCTION

$volume = "volumeBalok";                   // VARIABLE FUNCTION
$num = $volume(14,10,8);
echo "Hasil = $num cm³";
echo "<br>";
echo "<br>";

menghitungLuasTrapesium(1/2, 30, 20, 10);   // FUNCTION

$persegi = "luasPersegi";                   // VARIABLE FUNCTION
$hitung = $persegi(10,10);
echo "Hasil = $hitung cm²";
echo "<br>";
echo "<br>";


?>