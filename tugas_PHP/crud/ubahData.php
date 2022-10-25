<?php 
include_once("koneksi.php");

if(isset($_POST['ubahBuku'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $id_penerbit = $_POST['id_penerbit'];
    $id_pengarang = $_POST['id_pengarang'];
    $id_katalog = $_POST['id_katalog'];
    $qty_stok = $_POST['qty_stok'];
    $harga_pinjam = $_POST['harga_pinjam'];

    $queryUbah = "UPDATE buku SET judul = '$judul',
                                  tahun = '$tahun',
                                  id_penerbit = '$id_penerbit',
                                  id_pengarang = '$id_pengarang',
                                  id_katalog = '$id_katalog',
                                  qty_stok = '$qty_stok',
                                  harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'";

    $result = mysqli_query($conn, $queryUbah);
    
    echo"<meta http-equiv='refresh', content='0, url=index.php'>";
  
  }


// ubah data Penerbit
if(isset($_POST['ubahPenerbit'])) {
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $queryUbahPenerbit = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit'";

    $result2 = mysqli_query($conn, $queryUbahPenerbit);
    
    echo"<meta http-equiv='refresh', content='0, url=penerbit.php'>";
  
  }



// ubah data pengarang
if(isset($_POST['ubahPengarang'])) {
    $id_pengarang = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $queryUbahpengarang = "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'";

    $result2 = mysqli_query($conn, $queryUbahpengarang);
    
    echo"<meta http-equiv='refresh', content='0, url=pengarang.php'>";
  
  }



// ubah data Katalog
if(isset($_POST['ubahKatalog'])) {
    $id_katalog = $_POST['id_katalog'];
    $nama = $_POST['nama'];

    $queryUbahKatalog = "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'";

    $result3 = mysqli_query($conn, $queryUbahKatalog);
    
    echo"<meta http-equiv='refresh', content='0, url=katalog.php'>";
  
  }

?>