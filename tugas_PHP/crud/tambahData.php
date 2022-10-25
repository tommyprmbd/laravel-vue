<?php 
include_once("koneksi.php");

if(isset($_POST['tambahBuku'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $id_penerbit = $_POST['id_penerbit'];
    $id_pengarang = $_POST['id_pengarang'];
    $id_katalog = $_POST['id_katalog'];
    $qty_stok = $_POST['qty_stok'];
    $harga_pinjam = $_POST['harga_pinjam'];
  
    $result = mysqli_query($conn, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
    
    echo"<meta http-equiv='refresh', content='0, url=index.php'>";
  }

// tambah Data Penerbit
if(isset($_POST['tambahPenerbit'])) {
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
  
    $result2 = mysqli_query($conn, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
    
    echo"<meta http-equiv='refresh', content='0, url=penerbit.php'>";
  }

  // tambah Data Pengarang
if(isset($_POST['tambahPengarang'])) {
    $id_pengarang = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
  
    $result2 = mysqli_query($conn, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat');");
    
    echo"<meta http-equiv='refresh', content='0, url=pengarang.php'>";
  }


  // tambah Data Katalog
if(isset($_POST['tambahKatalog'])) {
    $id_katalog = $_POST['id_katalog'];
    $nama = $_POST['nama'];
  
    $result2 = mysqli_query($conn, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
    
    echo"<meta http-equiv='refresh', content='0, url=katalog.php'>";
  }

?>