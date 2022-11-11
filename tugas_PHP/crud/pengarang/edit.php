<html>
<head>
	<title>Edit Pengarang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("../connect.php");
	$id_pengarang = $_GET['id_pengarang'];

    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
    	$id_pengarang = $pengarang_data['id_pengarang'];
    	$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email = $pengarang_data['email'];
    	$telp = $pengarang_data['telp'];
    	$alamat = $pengarang_data['alamat'];
    }
?>

<?php
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['update'])) {

		$id_pengarang = $_GET['id_pengarang'];
		$nama_pengarang = $_POST['nama_pengarang'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		
		include_once("../connect.php");

		$result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");
		
		header("Location:pengarang.php");
	}
?>

<body style="background-color: #F3F9F9;">
	<div class="container mt-4">
		<center>
			<a class='btn btn-primary' href="pengarang.php">Go to Home</a>
			<div class="row mt-3">
				<form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="POST">
					<div class="mb-3 col-lg-2">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" value="<?php echo $id_pengarang; ?>">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="nama" class="form-label">Nama Pengarang</label>
						<input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>