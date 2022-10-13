<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangun Datar</title>
</head>
<body>
    <h1 style="text-align: center;"> Bangun Datar</h1>
    <?php 
    $s = 10;
    $p = 8;
    $l = 6;
    $a = 8;
    $t = 12;
    $phi = 22/7;
    $r = 7;

    echo"<h4>Rumus Persegi Panjang</h4>";
    $lpp = $p * $l;
    echo"panjang X lebar";
    echo"<br>";
    echo"$p * $l = $lpp";
    echo"<hr>";

    echo"<h4>Rumus Luas Persegi</h4>";
    $lp = $s * $s; 
    echo"Sisi X Sisi";
    echo"<br>";
    echo"$s * $s = $lp";
    echo"<hr>";

    echo"<h4>Rumus Luas Segitiga</h4>";
    $sgt = 0.5 * $a * $t; 
    echo"1/2 X Alas X Tinggi";
    echo"<br>";
    echo"0.5 * $a * $t = $sgt";
    echo"<hr>";

    echo"<h4>Rumus Luas Belah Ketupat</h4>";
    $bk = $a * $t; 
    echo"Alas X Tinggi";
    echo"<br>";
    echo"$a * $t = $bk";
    echo"<hr>";

    echo"<h4>Rumus Luas Lingkaran</h4>";
    $lkr = $phi * $r**2;
    echo"phi X r^2";
    echo"<br>";
    echo"$phi * $r**2 = $lkr";
    echo"<hr>";
    ?>
</body>
</html>