<?php
    include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT *  FROM pengarang");
?>

<html>
<head>
    <title>Pengarang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
 <nav class="navbar navbar-light bg-ligh" style="background-color: #ffc107;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">PENGARANG</a>
    <center>
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/index.php">Buku</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_penerbit/penerbit.php">Penerbit</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_pengarang/pengarang.php">Pengarang</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_katalog/katalog.php">Katalog</a>
    </center>
  </div>
</nav>


    <div class="container mt-3">
        <a class='btn btn-primary' href="add.php">Add New Pengarang</a><br /><br />
            <table class="table" width='80%' border=1>

                <tr>
                    <th>ID Pengarang</th>
                    <th>Nama Pengarang</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php
                while ($pengarang_data = mysqli_fetch_array($pengarang)) {
                    echo "<tr>";
                    echo "<td>" . $pengarang_data['id_pengarang'] . "</td>";
                    echo "<td>" . $pengarang_data['nama_pengarang'] . "</td>";
                    echo "<td>" . $pengarang_data['email'] . "</td>";
                    echo "<td>" . $pengarang_data['telp'] . "</td>";
                    echo "<td>" . $pengarang_data['alamat'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td></tr>";
                }
                ?>
            </table>
    </div>
</body>
</html>