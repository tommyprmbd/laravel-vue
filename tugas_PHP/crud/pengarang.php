<?php 
require 'koneksi.php';

$queryPengarang = mysqli_query($conn, "SELECT * FROM pengarang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengarang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <div class="container">
    <a class="navbar-brand fw-bolder" href="index.php">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-lg-0 ">
        <li class="nav-item mx-3">
          <a class="nav-link" aria-current="page" href="index.php">Buku</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="penerbit.php">Penerbit</a>
        </li>
        <li class="nav-item mx-3">
         <a class="nav-link" href="pengarang.php">Pengarang</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="katalog.php">Katalog</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
<div class="card">
  <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Data Pengarang

      </div>
      <div class="card-body">
      <button class="btn btn-sm btn-outline-success fw-bold mb-3" type="button" data-bs-toggle="modal" data-bs-target="#tambahPengarang">Tambah Pengarang</button>
    <table class="table table-striped table-bordered table-sm" id="tabel2">
        <thead>
            <tr>
                <th scope="col">ID Pengarang</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
    <tbody>
      <?php while ($pengarang = mysqli_fetch_assoc($queryPengarang)) : ?>
        <tr>
            <td><?= $pengarang["id_pengarang"]; ?></td>
            <td><?= $pengarang["nama_pengarang"]; ?></td>
            <td><?= $pengarang["email"]; ?></td>
            <td><?= $pengarang["telp"]; ?></td>
            <td><?= $pengarang["alamat"]; ?></td>
            <td>
            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ubahPengarang<?= $pengarang['id_pengarang'] ?>"><i class="bi bi-pencil-square"></i></button>

          <a class="btn btn-danger btn-sm" href="hapusPengarang.php?id_pengarang=<?= $pengarang["id_pengarang"] ?>" onclick="return confirm('Yakin Ingin Menghapus Data pengarang Ini?')" ><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <?php endwhile ?>
    </tbody>
    </table>
  </div>
</div>
</div>

<!-- modal 
tambah data Penerbit -->
<div class="modal fade" id="tambahPengarang" tabindex="-1" aria-labelledby="tambahPengarangLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="tambahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Tambah Data Penerbit
    </div>
    <!-- awal 1 input -->
    <div class="row mt-4 mx-1">
      <label for="id_pengarang" class="col-sm-3 col-form-label">Id</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
          <input type="text" class="form-control" name="id_pengarang" id="id_pengarang" placeholder="Masukkan ID" aria-label="id_pengarang" required>
        </div>
        </div>
    </div>
    <div class="row mt-4 mx-1">
      <label for="nama_pengarang" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" placeholder="Masukkan Nama" aria-label="nama_pengarang" required>
        </div>
        </div>
    </div>
    <div class="row mt-4 mx-1">
      <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email" aria-label="email" required>
        </div>
        </div>
    </div>
    <div class="row mt-4 mx-1">
      <label for="telp" class="col-sm-3 col-form-label">Telepon</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
          <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No. Telepon" aria-label="telp" required>
        </div>
        </div>
    </div>
    <div class="row mt-4 mx-1">
      <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" aria-label="alamat" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input -->
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-success" name="tambahPengarang">Tambah</button>
    </div>
  </form>
    </div>
  </div>
</div>

<!-- modal
UBAH DATA pengarang -->
<?php 
include_once("koneksi.php");
$queryPengarang = mysqli_query($conn, "SELECT * FROM pengarang");
while ($pengarang = mysqli_fetch_assoc($queryPengarang)) : 
?>

<div class="modal fade" id="ubahPengarang<?= $pengarang['id_pengarang'] ?>" tabindex="-1" aria-labelledby="ubahPengarangLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="ubahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-warning p-2 text-white text-center fs-5 fw-bold">Ubah Data pengarang
    </div>
    <!-- awal 1 input -->
          <input type="hidden" name="id_pengarang" id="id_pengarang" value="<?= $pengarang["id_pengarang"] ?>">
     <!-- akhir 1 input -->

    <!-- awal 1 input -->
          <input type="hidden" name="id_pengarang" id="id_pengarang" value="<?= $pengarang["id_pengarang"] ?>">

    <!--  akhir 1 input -->

    <div class="row mt-4 mx-1">
      <label for="nama_pengarang" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" value="<?= $pengarang["nama_pengarang"] ?>" required>
        </div>
        </div>
    </div>

    <div class="row mt-4 mx-1">
      <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="text" class="form-control" name="email" id="email" value="<?= $pengarang["email"] ?>" required>
        </div>
        </div>
    </div>

    <div class="row mt-4 mx-1">
      <label for="telp" class="col-sm-3 col-form-label">Telepon</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
          <input type="text" class="form-control" name="telp" id="telp" value="<?= $pengarang["telp"] ?>" required>
        </div>
        </div>
    </div>

    <div class="row mt-4 mx-1">
      <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
          <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $pengarang["alamat"] ?>" required>
        </div>
        </div>
    </div>

     </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-warning" name="ubahPengarang">Ubah</button>
    </div>
  </form>
    </div>
  </div>
</div>
<?php endwhile ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>