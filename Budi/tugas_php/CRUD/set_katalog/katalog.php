<?php
include_once("../connect.php");
$Katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>

<head>
    <title>Katalog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-light bg-ligh" style="background-color: #ffc107;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">KATALOG</a>
    <center>
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/index.php">Buku</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_penerbit/penerbit.php">Penerbit</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_pengarang/pengarang.php">Pengarang</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_katalog/katalog.php">Katalog</a>
    </center>
  </div>
</nav>

    <div class="container mt-3">
        <a class='btn btn-primary' href="add.php">Add New katalog</a><br /><br />
            <table class="table" width='80%' border=1>
                <tr>
                    <th>Id Katalog</th>
                    <th>Nama</th>
                </tr>
                <?php
                while ($katalog_data = mysqli_fetch_array($Katalog)) {
                    echo "<tr>";
                    echo "<td>" . $katalog_data['id_katalog'] . "</td>";
                    echo "<td>" . $katalog_data['nama'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
                }
                ?>
            </table>
    </div>
</body>
</html>