<html>
<head>
	<title>Edit Penerbit</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("../connect.php");
	$id_penerbit = $_GET['id_penerbit'];

    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit' ");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    	$id_penerbit = $penerbit_data['id_penerbit'];
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>

<body style="background-color: #F3F9F9;">
	<div class="container mt-4">
		<center>
			<a class='btn btn-primary' href="penerbit.php">Go to Home</a>
			<div class="row mt-3">
				<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="POST">
					<div class="mb-3 col-lg-2">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" value="<?php echo $id_penerbit; ?>">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="nama" class="form-label">Nama Penerbit</label>
						<input type="text" class="form-control" name="nama_penerbit" id="nama_penerbit" value="<?php echo $nama_penerbit; ?>">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="email" class="form-label">Email</label>
						<input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="telp" class="form-label">Telp</label>
						<input type="text" class="form-control" name="telp" id="telp" value="<?php echo $telp; ?>">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="alamat" class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>">
					</div>
					<input type="submit" class='btn btn-primary' name="update" value="Update">
				</form>
			</div>
		</center>
	</div>

	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_penerbit = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit'; ");
			
			header("Location:penerbit.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>