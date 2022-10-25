<?php 
include_once "koneksi.php";
$queryBuku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nm_katalog FROM buku
                                        JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        JOIN katalog ON katalog.id_katalog = buku.id_katalog ORDER BY tahun ASC");

$queryPenerbit = mysqli_query($conn, "SELECT * FROM penerbit");
$queryPengarang = mysqli_query($conn, "SELECT * FROM pengarang");
$queryKatalog = mysqli_query($conn, "SELECT * FROM katalog");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Buku</title>
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
  <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Data Buku

      </div>
      <div class="card-body">
      <button class="btn btn-sm btn-outline-success fw-bold mb-3" type="button" data-bs-toggle="modal" data-bs-target="#tambahBuku">Tambah Buku</button>
    <table class="table table-striped table-bordered table-sm" id="tabel2">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Judul</th>
                <th scope="col">Tahun</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Katalog</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Pinjam</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
    <tbody>
      <?php while ($buku = mysqli_fetch_assoc($queryBuku)) : ?>
        <tr>
            <td><?= $buku["isbn"]; ?></td>
            <td><?= $buku["judul"]; ?></td>
            <td><?= $buku["tahun"]; ?></td>
            <td><?= $buku["nama_pengarang"]; ?></td>
            <td><?= $buku["nama_penerbit"]; ?></td>
            <td><?= $buku["nm_katalog"]; ?></td>
            <td><?= $buku["qty_stok"]; ?></td>
            <td><?= "Rp. ".$buku["harga_pinjam"]; ?></td>
            <td>
              <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ubahBuku<?= $buku['isbn'] ?>"><i class="bi bi-pencil-square"></i></button>
              
              <a class="btn btn-danger btn-sm" href="hapusData.php?isbn=<?= $buku["isbn"] ?>" onclick="return confirm('Yakin Ingin Menghapus Data Buku Ini?')" ><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endwhile ?>
    </tbody>
    </table>
  </div>
</div>
</div>

<!-- modal 
tambah data Buku -->
<div class="modal fade" id="tambahBuku" tabindex="-1" aria-labelledby="tambahBukuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="tambahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-success p-2 text-white text-center fs-5 fw-bold bg-opacity-75">Tambah Data Buku
    </div>
    <!-- awal 1 input -->
    <div class="row mt-4 mx-1">
      <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-bookmarks-fill"></i></span>
          <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Masukkan ISBN" aria-label="isbn" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="judul" class="col-sm-3 col-form-label">Judul</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-window-desktop"></i></span>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" aria-label="judul" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
          <select class="form-select" aria-label="Default select example" id="tahun" name="tahun" required>
            <option value="">-- Pilih Tahun --</option>
            <?php 
            $thnNow = date('Y');
            for ($thn = $thnNow; $thn >= 2010 ; $thn--) { ?>
              <option value="<?= $thn ?>"><?= $thn ?></option>
            <?php } ?>
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_pengarang" class="col-sm-3 col-form-label">Pengarang</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
          <select class="form-select" aria-label="Default select example" id="pengarang" name="id_pengarang" required>
          <option value="">-- Pilih Penerbit --</option>
            <?php 
            while ($pengarang = mysqli_fetch_assoc($queryPengarang)) : ?>
            <option value="<?= $pengarang['id_pengarang'] ?>"><?= $pengarang['nama_pengarang'] ?></option>
            <?php endwhile ?>
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_penerbit" class="col-sm-3 col-form-label">Penerbit</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <select class="form-select" aria-label="Default select example" id="penerbit" name="id_penerbit" required>
          <option value="">-- Pilih Penerbit --</option>
            <?php 
            while ($penerbit = mysqli_fetch_assoc($queryPenerbit)) : ?>
            <option value="<?= $penerbit['id_penerbit'] ?>"><?= $penerbit['nama_penerbit'] ?></option>
            <?php endwhile ?>
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_katalog" class="col-sm-3 col-form-label">Katalog</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-book-fill"></i></span>
          <select class="form-select" aria-label="Default select example" id="katalog" name="id_katalog" required>
          <option value="">-- Pilih Katalog --</option>
            <?php 
            while ($katalog = mysqli_fetch_assoc($queryKatalog)) : ?>
              <option value="<?= $katalog['id_katalog'] ?>"><?= $katalog['nama'] ?></option>

            <?php endwhile ?>
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="qty_stok" class="col-sm-3 col-form-label">Stok</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-calculator"></i></span>
          <input type="text" class="form-control" name="qty_stok" id="qty" placeholder="Masukkan Stok" aria-label="qty" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="harga_pinjam" class="col-sm-3 col-form-label">Harga</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
          <input type="text" class="form-control" name="harga_pinjam" id="harga" aria-label="harga" placeholder="Masukkan Harga" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input -->
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-success" name="tambahBuku">Tambah</button>
    </div>
  </form>
    </div>
  </div>
</div>



<!-- modal
UBAH DATA BUKU -->
<?php 
include_once("koneksi.php");
$queryBuku = mysqli_query($conn, "SELECT * FROM buku");
while ($buku = mysqli_fetch_assoc($queryBuku)) : 
?>

<div class="modal fade" id="ubahBuku<?= $buku['isbn'] ?>" tabindex="-1" aria-labelledby="ubahBukuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-body">
        <form action="ubahData.php" method="POST">
      <div class="card">
    <div class="card-header bg-warning p-2 text-white text-center fs-5 fw-bold">Ubah Data Buku
    </div>
    <!-- awal 1 input -->
          <input type="hidden" name="isbn" id="isbn" value="<?= $buku["isbn"] ?>">
     <!-- akhir 1 input -->

    <!-- awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="judul" class="col-sm-3 col-form-label">Judul</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-window-desktop"></i></span>
          <input type="text" class="form-control" name="judul" id="judul" value="<?= $buku["judul"] ?>"required>
        </div>
        </div>
    </div>
    <!--  akhir 1 input -->

    <!-- awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
          <select class="form-select" aria-label="Default select example" id="tahun" name="tahun" required>

            <?php 
            $thnNow = date('Y');
            for ($thn = $thnNow; $thn >= 2010 ; $thn--) { ?>
              <option value="<?= $thn ?>"
              <?php 
              if ($buku["tahun"] == $thn) {
                echo"selected";
              }
              ?>
              
              ><?= $thn ?></option>
            <?php } ?>

          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input -->

    <!-- awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_pengarang" class="col-sm-3 col-form-label">Pengarang</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
          <select class="form-select" aria-label="Default select example" id="id_pengarang" name="id_pengarang" required>
          <?php 
          $queryPengarang = mysqli_query($conn, "SELECT * FROM pengarang");
          while ($dataPengarang = mysqli_fetch_assoc($queryPengarang)) : ?>
          <option value="<?= $dataPengarang["id_pengarang"]?>"

          <?php 
          if ($buku["id_pengarang"] == $dataPengarang["id_pengarang"]) {
            echo"selected";
          } ?>
          
          ><?= $dataPengarang["nama_pengarang"]?></option>

          <?php endwhile ?>

          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_penerbit" class="col-sm-3 col-form-label">Penerbit</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <select class="form-select" aria-label="Default select example" id="penerbit" name="id_penerbit" required>
          <?php 
          $queryPenerbit = mysqli_query($conn, "SELECT * FROM penerbit");
          while ($dataPenerbit = mysqli_fetch_assoc($queryPenerbit)) : ?>
          <option value="<?= $dataPenerbit["id_penerbit"]?>"
          
          <?php 
          if ($buku["id_penerbit"] == $dataPenerbit["id_penerbit"]) {
            echo"selected";
          }
          ?>
          
          ><?= $dataPenerbit["nama_penerbit"] ?></option>
          <?php endwhile ?>
           
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="id_katalog" class="col-sm-3 col-form-label">Katalog</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-book-fill"></i></span>
          <select class="form-select" aria-label="Default select example" id="katalog" name="id_katalog" required>
            <?php 
            $queryKatalog = mysqli_query($conn, "SELECT * FROM katalog");
            while ($dataKatalog = mysqli_fetch_assoc($queryKatalog)) : ?>
            <option value="<?= $dataKatalog["id_katalog"]?>"
            
            <?php 
            if ($buku["id_katalog"] == $dataKatalog["id_katalog"]) {
              echo"selected";
            }
            ?>
            
            ><?= $dataKatalog["nama"] ?></option>
            <?php endwhile ?>
          </select>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="qty_stok" class="col-sm-3 col-form-label">Stok</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-calculator"></i></span>
          <input type="text" class="form-control" name="qty_stok" id="qty" value=" <?= $buku["qty_stok"]?> " required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input 
    awal 1 input -->
    <div class="row mt-2 mx-1">
      <label for="harga_pinjam" class="col-sm-3 col-form-label">Harga</label>
        <div class="col-sm-9">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
          <input type="text" class="form-control" name="harga_pinjam" id="harga" value="<?= $buku["harga_pinjam"]?>" required>
        </div>
        </div>
    </div>
    <!-- akhir 1 input -->
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-warning" name="ubahBuku">Ubah</button>
    </div>
  </form>
    </div>
  </div>
</div>
<?php endwhile ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>