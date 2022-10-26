<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$Katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>

<head>
    <title>Pengrang</title>
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

    <a href="add.php">Add New Buku</a><br /><br />

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
</body>

</html>