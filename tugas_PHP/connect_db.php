<?php 
$servername= "localhost";
$username = "root";
$password = "";
$database = "perpus";

//koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

//cek koneksi
if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

//ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM penerbit");
$result1 = mysqli_query($conn, "SELECT * FROM pengarang");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database</title>
    <style>
        .container{
            display: flex;
        }
        .penerbit, .pengarang{
            width: 100%;
        }
        .tr:nth-child(even){
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="penerbit">
            <h2 class="judulPenerbit">Data Penerbit</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Nama Penerbit</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                    </tr>

                <?php while ($penerbit = mysqli_fetch_assoc($result)) : ?>
                    <tr class="tr">
                        <td><?= $penerbit["nama_penerbit"]  ?></td>
                        <td><?= $penerbit["email"] ?></td>
                        <td><?= $penerbit["telp"] ?></td>
                        <td><?= $penerbit["alamat"] ?></td>
                    </tr>
                <?php endwhile ?>
                </table>
                </div>

                <div class="pengarang">
                <h2>Data Pengarang</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Nama Pengarang</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                    </tr>

                    <?php while ($pengarang = mysqli_fetch_assoc($result1)) : ?>
                    <tr class="tr">
                        <td><?= $pengarang["nama_pengarang"]  ?></td>
                        <td><?= $pengarang["email"] ?></td>
                        <td><?= $pengarang["telp"] ?></td>
                        <td><?= $pengarang["alamat"] ?></td>
                    </tr>
                    <?php endwhile ?>
                </table>
        </div>
    </div>

</body>
</html>