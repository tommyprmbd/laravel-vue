<?php 
require 'koneksi.php';

$queryKatalog = mysqli_query($conn, "SELECT * FROM katalog");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Katalog</title>
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
  <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Data Katalog

      </div>
      <div class="card-body">
      <button class="btn btn-sm btn-outline-success fw-bold mb-3" type="button" data-bs-toggle="modal" data-bs-target="#tambahKatalog">Tambah Katalog</button>
    <table class="table table-striped table-bordered table-sm" id="tabel2">
        <thead>
            <tr>
                <th scope="col">ID Katalog</th>
                <th scope="col">Nama Katalog</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
    <tbody>
      <?php while ($katalog = mysqli_fetch_assoc($queryKatalog)) : ?>
        <tr>
            <td><?= $katalog["id_katalog"]; ?></td>
            <td><?= $katalog["nama"]; ?></td>
            <td>
            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ubahKatalog<?= $katalog['id_katalog'] ?>"><i class="bi bi-pencil-square"></i></button>

          <a class="btn btn-danger btn-sm" href="hapusKatalog.php?id_katalog=<?= $katalog["id_katalog"] ?>" onclick="return confirm('Yakin Ingin Menghapus Data Katalog Ini?')" ><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <?php endwhile ?>
    </tbody>
    </table>
  </div>
</div>
</div>

<!-- modal 
tambah data katalog -->
<div class="modal fade" id="tambahKatalog" tabindex="-1" aria-labelledby="tambahKatalogLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="tambahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Tambah Data Katalog
    </div>
    <!-- awal 1 input -->
    <div class="row mt-4 mx-1">
      <label for="id_katalog" class="col-sm-3 col-form-label">ID katalog</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
          <input type="text" class="form-control" name="id_katalog" id="id_katalog" placeholder="Masukkan ID" aria-label="id_katalog" required>
        </div>
        </div>
    </div>
    <div class="row mt-4 mx-1">
      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" aria-label="nama" required>
        </div>
        </div>
    </div>


      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-success" name="tambahKatalog">Tambah</button>
    </div>
  </form>
    </div>
  </div>
</div>

<!-- modal
UBAH DATA katalog -->
<?php 
include_once("koneksi.php");
$queryKatalog = mysqli_query($conn, "SELECT * FROM katalog");
while ($katalog = mysqli_fetch_assoc($queryKatalog)) : 
?>

<div class="modal fade" id="ubahKatalog<?= $katalog['id_katalog'] ?>" tabindex="-1" aria-labelledby="ubahKatalogLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="ubahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-warning p-2 text-white text-center fs-5 fw-bold">Ubah Data katalog
    </div>
    <!-- awal 1 input -->
          <input type="hidden" name="id_katalog" id="id_katalog" value="<?= $katalog["id_katalog"] ?>">
     <!-- akhir 1 input -->

    <div class="row mt-4 mx-1">
      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" class="form-control" name="nama" id="nama" value="<?= $katalog["nama"] ?>" required>
        </div>
        </div>
    </div>
    <!-- akhir input -->

     </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-warning" name="ubahKatalog">Ubah</button>
    </div>
  </form>
    </div>
  </div>
</div>
<?php endwhile ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>