<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit")
?>
 
<html>
<head>    
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>
<nav class="navbar navbar-light bg-ligh" style="background-color: #ffc107;">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">PENERBIT</a>
    <center>
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/index.php">Buku</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_penerbit/penerbit.php">Penerbit</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_pengarang/pengarang.php">Pengarang</a> |
        <a class='btn btn-primary' href="http://localhost/laravel-vue/Budi/tugas_php/CRUD/set_katalog/katalog.php">Katalog</a>
    </center>
  </div>
</nav>
    

 <div class="container mt-3">
        <a class='btn btn-primary' href="add.php">Add New penerbit</a><br /><br />
    <table class="table" width='80%' border=1>
 
    <tr class="text-center">
        <th>ID Penerbit</th> 
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>telp</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id_penerbit']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";    
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";    
   
            echo "<td><a class='btn btn-primary' href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</div>
</body>
</html>