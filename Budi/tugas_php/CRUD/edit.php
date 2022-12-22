<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<title>edit buku</title>
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
	 <a class='btn btn-primary' href="index.php">Go to home</a>

 <div class="container d-flex justify-content-center">
 <div class="card shadow " style="height: 26rem; width: 25rem;">
 <div class="card-header">ISBN <a style="font-size: 11pt;"><?php echo $isbn; ?> </a></div>
 <div class="card-body">
		
	<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
			<div class="mb-2 row"> 
				<p class="col-sm-5">Judul</p>
			<div class="col-sm-7">
				<input type="text" name="judul" value="<?php echo $judul; ?>">
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Tahun</p>
			<div class="col-sm-7">
				<input type="text" name="tahun" value="<?php echo $tahun; ?>">
			</div>
			</div>

			<div class="md-2 row"> 
				<p class="col-sm-5">Penerbit</p>
			<div class="col-sm-7">		
					<select name="id_penerbit">
						<?php 
						    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
						    	echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="md-2 row"> 
				<p class="col-sm-5">Pengarang</p>
			<div class="col-sm-7">
					<select name="id_pengarang">
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="md-2 row"> 
				<p class="col-sm-5">Katalog</p>
			<div class="col-sm-7">		
					<select name="id_katalog">
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
			</div>
			</div>

			<div class="md-2 row"> 
				<p class="col-sm-5">Qty Stok</p>
			<div class="col-sm-7">	
				<input type="text" name="qty_stok" value="<?php echo $qty_stok; ?>">
			</div>
			</div>

			<div class="md-2 row"> 
				<p class="col-sm-5">Harga Pinjam</p>
			<div class="col-sm-7">	
				<input type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>">
			</div>
			</div>

			<div class="md-2 row d-grid">
				<button type="submit" class="btn btn-primary">update</button>	
			</div>
		</table>
	</form>
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
</div>
</div>
</body>
</html>