<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$pengarang = mysqli_query($mysqli, "SELECT *  FROM pengarang 
                                        -- LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        -- LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        -- LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ");
?>

<html>

<head>
    <title>Page Pengarang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<body>
    <?php $project_location = "http://localhost/Tugas_PHP/CRUD";
    $url = $project_location; ?>

    <center>
        <a href="<?= $url; ?>/index.php">Buku</a> |
        <a href="<?= $url; ?>/penerbit/index.php">Penerbit</a> |
        <a href="<?= $url; ?>/pengarang/index.php">Pengarang</a> |
        <a href="<?= $url; ?>/katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="<?= $url; ?>/pengarang/add.php">Add New Pengarang</a><br /><br />

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
</body>

</html>