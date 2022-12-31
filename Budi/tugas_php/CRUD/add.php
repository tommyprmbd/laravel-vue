<html>
<head>
	<title>Add Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body>
	<a class='btn btn-primary' href="index.php">Go to home</a>
	<br/><br/>
 
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 31rem; width: 25rem;">
 	<div class="card-header text-center"><a style="font-size: 15pt;">ADD DATA BUKU</a></div>
 	<div class="card-body">

	<form action="add.php" method="post" name="form1">

			<div class="mb-2 row">
				<p class="col-sm-5">ISBN</p>
			<div class="col-sm-7">
				<input type="text" name="isbn">
			</div>
			</div>

			<div class="mb-2 row">
				<p class="col-sm-5">Judul</p>
			<div class="col-sm-7">
				<input type="text" name="judul">
			</div>
			</div>

			<div class="mb-2 row">
				<p class="col-sm-5">Tahun</p>
			<div class="col-sm-7">
				<input type="text" name="tahun">
			</div>
			</div>

			<div class="mb-2 row">
				<p class="col-sm-5">Penerbit</p>
			<div class="col-sm-7">
					<select name="id_penerbit">
						<?php 
						    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
						    	echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Pengarang</p>
			<div class="col-sm-7">
					<select name="id_pengarang">
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Katalog</p>
			<div class="col-sm-7">
					<select name="id_katalog">
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Qty Stok</p>
			<div class="col-sm-7">
				<input type="text" name="qty_stok">
			</div>
			</div>

			<div class="mb-2 row">
				<p class="col-sm-5">Harga Pinjam</p>
			<div class="col-sm-7">
				<input type="text" name="harga_pinjam">
			</div>
			</div>

			<div class="mb-2 row d-grid">
				<button name="submit" class="btn btn-primary">Add Data</button>	
			</div>
	</form>
	</div>
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['submit'])) {
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
</div>
</div>
</body>
</html>