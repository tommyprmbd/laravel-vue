<html>
<head>
	<title>Add Buku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("connect.php");
	$buku = mysqli_query($mysqli, "SELECT * FROM buku")
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body>
	<div class="container mt-4">
		<a href="index.php">Go to Home</a>
		<div class="row mt-4">
			<form action="add.php" method="post" name="form1">
				<div class="mb-3 col-lg-2">
					<label for="Isbn" class="form-label">ISBN</label>
					<input type="text" class="form-control" name="isbn" id="isbn">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="judul" class="form-label">Judul</label>
					<input type="text" class="form-control" name="judul" id="judul">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Tahun</label>
					<input type="text" class="form-control" name="tahun" id="tahun">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="penerbit" class="form-label">Penerbit</label>
					<select class="form-select" aria-label="Default select example" name="id_penerbit" id="id_penerbit">
						<?php
						while ($penerbit_data = mysqli_fetch_array($penerbit)) {
							echo "<option value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="pegarang" class="form-label">Pengarang</label>
					<select class="form-select" aria-label="Default select example" name="id_pengarang" id="id_pengarang">
						<?php
						while ($pengarang_data = mysqli_fetch_array($pengarang)) {
							echo "<option value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="katalog" class="form-label">Katalog</label>
					<select class="form-select" aria-label="Default select example" name="id_katalog" id="id_katalog">
						<?php
						while ($katalog_data = mysqli_fetch_array($katalog)) {
							echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="qty_stok" class="form-label">Qty Stok</label>
					<input type="text" class="form-control" name="qty_stok" id="qty_stok">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="harga_pinjam" class="form-label">Harga Pinjam</label>
					<input type="text" class="form-control" name="harga_pinjam" id="harga_pinjam">
				</div>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$isbn = $_POST['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
			
			header("Location:index.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>