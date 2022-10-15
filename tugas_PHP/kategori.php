<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
        <h2>Menghitung Nilai BMI</h2>
        <table>
            <tr>
                <td>
                    <label for="nama">
                    Nama
                    </label>
                </td>
                <td> 
                    <input type="text" name="nama" id="nama" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="beratBadan">
                    Berat Badan (kg)
                    </label>
                </td>
                <td> 
                    <input type="text" name="beratBadan" id="beratBadan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tinggiBadan">Tinggi Badan (cm)</label>
                </td>
                <td>
                    <input type="text" name="tinggiBadan" id="tinggiBadan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="hitung">Hitung</button>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>

<?php 
if (isset($_POST["hitung"])) {
    $nama = $_POST["nama"];
    $bb = $_POST["beratBadan"];
    $tb = $_POST["tinggiBadan"]/100;

    $tbcm = $tb;
    $hasil = $bb / ($tbcm * $tbcm);

    if ($hasil < 18.5) {
        echo"<p style='text-align: center;'> Hallo <b>$nama</b><br> Nilai BMI anda <b>".number_format($hasil,2)."</b><br> Berat Badan Anda Termasuk <b>Kurus</b></p>";
    } elseif ($hasil < 24.9){
        echo"<p style='text-align: center;'> Hallo <b>$nama</b><br> Nilai BMI anda <b>".number_format($hasil,2)."</b><br> Berat Badan Anda Termasuk <b>Ideal</b></p>";
    }elseif ($hasil < 29.9){
        echo"<p style='text-align: center;'> Hallo <b>$nama</b><br> Nilai BMI anda <b>".number_format($hasil,2)."</b><br> Berat Badan Anda Termasuk <b>Kelebihan Berat Badan</b></p>";
    }elseif ($hasil > 30.0){
        echo"<p style='text-align: center;'> Hallo <b>$nama</b><br> Nilai BMI anda <b>".number_format($hasil,2)."</b><br> Berat Badan Anda Termasuk <b>Obesitas!!</b></p>";
    }
}
?>