<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$Penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<html>

<head>
    <title>Penerbit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <?php $project_location = "/Tugas_PHP/CRUD";
    $url = $project_location; ?>
    <nav class="navbar navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#" style="position: relative; left: 50px;">Buku</a>
        </div>
    </nav>
    <center class="mt-4">
        <a class='btn btn-primary' href="<?= $url; ?>/index.php">Buku</a> |
        <a class='btn btn-primary' href="<?= $url; ?>/penerbit/index.php">Penerbit</a> |
        <a class='btn btn-primary' href="<?= $url; ?>/pengarang/index.php">Pengarang</a> |
        <a class='btn btn-primary' href="<?= $url; ?>/katalog/index.php">Katalog</a>
    </center>


    <div class="container mt-3">
        <a class='btn btn-primary' href="add.php">Add New Penerbit</a><br /><br />
        <div class="row">
            <table class="table" width='80%' border=1>

                <tr>
                    <th>ID Penerbit</th>
                    <th>Nama Penerbit</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php
                while ($Penerbit_data = mysqli_fetch_array($Penerbit)) {
                    echo "<tr>";
                    echo "<td>" . $Penerbit_data['id_penerbit'] . "</td>";
                    echo "<td>" . $Penerbit_data['nama_penerbit'] . "</td>";
                    echo "<td>" . $Penerbit_data['email'] . "</td>";
                    echo "<td>" . $Penerbit_data['telp'] . "</td>";
                    echo "<td>" . $Penerbit_data['alamat'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?id_penerbit=$Penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_penerbit=$Penerbit_data[id_penerbit]'>Delete</a></td></tr>";
                }
                ?>
            </table>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>