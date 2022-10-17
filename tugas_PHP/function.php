<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <?php 
    function rumusPersegiPanjang($panjang, $lebar){
        $hasil = $panjang*$lebar;
        echo"Rumus Persegi Panjang<br>";
        echo"Panjang X Lebar <br>";
        echo"$panjang X $lebar = $hasil <hr><br>";
    }
    rumusPersegiPanjang(20,5);
    
    function rumusPersegi($sisi){
        $hasil = $sisi*$sisi;
        echo"Rumus Persegi<br>";
        echo"Sisi X Sisi <br>";
        echo"$sisi X $sisi = $hasil <hr><br>";
    }
    rumusPersegi(10);
    
    function rumusSegitiga($alas, $tinggi){
        $hasil = 0.5*$alas*$tinggi;
        echo"Rumus Segitiga<br>";
        echo"0,5 X Alas X Tinggi <br>";
        echo"$alas X $tinggi = $hasil <hr><br>";
    }
    rumusSegitiga(10,15);

    function rumusBalok($panjang, $lebar, $tinggi){
        $hasil = $panjang*$lebar*$tinggi;
        echo"Rumus Balok<br>";
        echo"Panjang X Lebar X Tinggi <br>";
        echo"$panjang X $lebar X $tinggi = $hasil <hr><br>";
    }
    rumusBalok(30,10,15);

    function rumusKubus($sisi){
        $hasil = $sisi*$sisi*$sisi;
        echo"Rumus Kubus<br>";
        echo"Sisi X Sisi X Sisi <br>";
        echo"$sisi X $sisi X $sisi = $hasil <hr><br>";
    }
    rumusKubus(20);
    
    ?>
</body>
</html>