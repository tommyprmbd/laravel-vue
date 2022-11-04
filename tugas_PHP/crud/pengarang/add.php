<html>
<head>
	<title>Add Pengarang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("../connect.php");
	$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>
 
<body>
	<div class="container mt-5">
		<a class='btn btn-primary' href="pengarang.php">Go to Home</a>
		<div class="row mt-3">
			<form action="add.php" method="post" name="form1">

				<div class="mb-3 col-lg-2">
					<label for="id" class="form-label">ID</label>
					<input type="text" class="form-control" name="id_pengarang" id="id_pengarang">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="nama" class="form-label">Nama Pengarang</label>
					<input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="email" class="form-label">Email</label>
					<input type="text" class="form-control" name="email" id="email">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="telp" class="form-label">Telp</label>
					<input type="text" class="form-control" name="telp" id="telp">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="alamat" class="form-label">Alamat</label>
					<input type="text" class="form-control" name="alamat" id="alamat">
				</div>
				<input type="submit" class='btn btn-primary' name="Submit" value="Add">
			</form>
		</div>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_pengarang = $_POST['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat');");
			
			header("Location:pengarang.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>