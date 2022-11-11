<?php
    include_once("connect.php");
    $buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body style="background-color: #F3F9F9;">

<center>
    <a class='btn btn-primary mt-3 mr-3' href="index.php">Buku</a>
    <a class='btn btn-primary mt-3 mr-3' href="penerbit/penerbit.php">Penerbit</a>
    <a class='btn btn-primary mt-3 mr-3' href="pengarang/pengarang.php">Pengarang</a>
    <a class='btn btn-primary mt-3' href="katalog/katalog.php">Katalog</a>
    <hr style=" background-color: grey;">
</center>
<div class="container">
    <a class='btn btn-primary' href="add.php">Add New Buku</a><br/><br/>
     
    <table class="table " width='80%' border=1>
 
    <tr>
        <th style="text-align: center;">ISBN</th> 
        <th style="text-align: center;">Judul</th> 
        <th style="text-align: center;">Tahun</th> 
        <th style="text-align: center;">Pengarang</th>
        <th style="text-align: center;">Penerbit</th>
        <th style="text-align: center;">Katalog</th>
        <th style="text-align: center;">Stok</th>
        <th style="text-align: center;">Harga Pinjam</th>
        <th style="text-align: center;">Aksi</th>
    </tr>
    <?php  
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr>";
            echo "<td style='text-align: center;'>".$buku_data['isbn']."</td>";
            echo "<td style='text-align: center;'>".$buku_data['judul']."</td>";
            echo "<td style='text-align: center;'>".$buku_data['tahun']."</td>";    
            echo "<td style='text-align: center;'>".$buku_data['nama_pengarang']."</td>";    
            echo "<td style='text-align: center;'>".$buku_data['nama_penerbit']."</td>";    
            echo "<td style='text-align: center;'>".$buku_data['nama_katalog']."</td>";    
            echo "<td style='text-align: center;'>".$buku_data['qty_stok']."</td>";    
            echo "<td style='text-align: center;'>".$buku_data['harga_pinjam']."</td>";    
            echo "<td style='text-align: center;'><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</div>
</body>
</html>