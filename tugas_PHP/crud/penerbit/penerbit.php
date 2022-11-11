<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit ORDER BY nama_penerbit ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body style="background-color: #F3F9F9;">

<center>
    <a class='btn btn-primary mt-3 mr-3' href="../index.php">Buku</a>
    <a class='btn btn-primary mt-3 mr-3' href="../penerbit/penerbit.php">Penerbit</a>
    <a class='btn btn-primary mt-3 mr-3' href="../pengarang/pengarang.php">Pengarang</a>
    <a class='btn btn-primary mt-3' href="../katalog/katalog.php">Katalog</a>
    <hr style=" background-color: grey;">
</center>
<div class = "container">
    <a class='btn btn-primary' href="add.php">Add New Penerbit</a><br/><br/>
     
    <table class="table" width='80%' border=1>

    <tr>
        <th style="text-align: center;">ID</th> 
        <th style="text-align: center;">Nama Penerbit</th> 
        <th style="text-align: center;">Email</th> 
        <th style="text-align: center;">Telepon</th>
        <th style="text-align: center;">Alamat</th>
        <th style="text-align: center;">Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td style='text-align: center;'>".$penerbit_data['id_penerbit']."</td>";
            echo "<td style='text-align: center;'>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td style='text-align: center;'>".$penerbit_data['email']."</td>";    
            echo "<td style='text-align: center;'>".$penerbit_data['telp']."</td>";    
            echo "<td style='text-align: center;'>".$penerbit_data['alamat']."</td>";  
            echo "<td style='text-align: center;'><a class='btn btn-primary' href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";      
        }
    ?>
    </table>
</div>
</body>
</html>