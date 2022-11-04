<html>
<head>
	<title>Edit Buku</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("connect.php");
	$isbn = $_GET['isbn'];

	$buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

    while($buku_data = mysqli_fetch_array($buku))
    {
    	$judul = $buku_data['judul'];
    	$isbn = $buku_data['isbn'];
    	$tahun = $buku_data['tahun'];
    	$id_penerbit = $buku_data['id_penerbit'];
    	$id_pengarang = $buku_data['id_pengarang'];
    	$id_katalog = $buku_data['id_katalog'];
    	$qty_stok = $buku_data['qty_stok'];
    	$harga_pinjam = $buku_data['harga_pinjam'];
    }
?>
 
<body>
	<div class="container mt-4">
		<a href="index.php">Go to Home</a>
		<div class="row mt-4">
			<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">

				<div class="mb-3 col-lg-2">
					<label for="Isbn" class="form-label">ISBN</label>
					<input type="text" class="form-control" value="<?php echo $isbn; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="judul" class="form-label">Judul</label>
					<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Tahun</label>
					<input type="text" class="form-control" name="tahun" id="tahun" value="<?php echo $tahun; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="penerbit" class="form-label">Penerbit</label>
					<select class="form-select" aria-label="Default select example" name="id_penerbit" id="id_penerbit">
						<?php
						while ($penerbit_data = mysqli_fetch_array($penerbit)) {
							echo "<option " . ($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '') . " value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="pegarang" class="form-label">Pengarang</label>
					<select class="form-select" aria-label="Default select example" name="id_pengarang" id="id_pengarang">
						<?php
						while ($pengarang_data = mysqli_fetch_array($pengarang)) {
							echo "<option " . ($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '') . " value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="katalog" class="form-label">Katalog</label>
					<select class="form-select" aria-label="Default select example" name="id_katalog" id="id_katalog">
						<?php
						while ($katalog_data = mysqli_fetch_array($katalog)) {
							echo "<option " . ($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '') . " value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="mb-3 col-lg-6">
					<label for="qty_stok" class="form-label">Qty Stok</label>
					<input type="text" class="form-control" name="qty_stok" id="qty_stok" value="<?php echo $qty_stok; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="harga_pinjam" class="form-label">Harga Pinjam</label>
					<input type="text" class="form-control" name="harga_pinjam" id="harga_pinjam" value="<?php echo $harga_pinjam; ?>">
				</div>
				<input type="submit" class='btn btn-primary' name="update" value="Update">

			</form>
		</div>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>