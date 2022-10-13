<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangun Ruang</title>
</head>
<body>
    <h1 style="text-align: center;"> Bangun Ruang</h1>
    <br>
    <hr>
    <?php 
    $s = 10;
    $p = 8;
    $l = 6;
    $luasAlas = 40;
    $t = 12;
 

    echo"<h4>Rumus Volume Kubus</h4>";
    $volume= $s * $s * $s;
    echo"Sisi X Sisi X Sisi";
    echo"<br>";
    echo"$s * $s * $s = $volume";
    echo"<hr>";

    echo"<h4>Rumus Volume Balok</h4>";
    $volume = $p * $l * $t;
    echo"Panjang X Lebar X Tinggi";
    echo"<br>";
    echo"$p * $l * $t = $volume";
    echo"<hr>";

    echo"<h4>Rumus Volume Prisma</h4>";
    $volume = $luasAlas * $t;
    echo"Luas Alas X Tinggi";
    echo"<br>";
    echo"$luasAlas * $t = $volume";
    echo"<hr>";

    ?>
</body>
</html>

