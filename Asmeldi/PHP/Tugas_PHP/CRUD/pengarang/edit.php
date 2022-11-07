<html>

<head>
	<title>Edit Pengarang</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<?php
include_once("../connect.php");
$id_pengarang = $_GET['id_pengarang'];

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

while ($pengarang_data = mysqli_fetch_array($pengarang)) {
	$id_pengarang = $pengarang_data['id_pengarang'];
	$nama_pengarang = $pengarang_data['nama_pengarang'];
	$email = $pengarang_data['email'];
	$telp = $pengarang_data['telp'];
	$alamat = $pengarang_data['alamat'];
}
?><?php $project_location = "/Tugas_PHP/CRUD";
	$url = $project_location; ?>

<body>

	<div class="container mt-5">
		<a class='btn btn-primary' href="index.php">Go to Home</a>
		<div class="row mt-3">
			<form action="<?= $url; ?>/pengarang/edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="POST">
				<div class="mb-3 col-lg-2">
					<label for="tahun" class="form-label">Id Pengarang</label>
					<input type="text" class="form-control" name="id_pengarang" id="id_pengarang" value="<?php echo $id_pengarang; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Nama Pengarang</label>
					<input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Telp</label>
					<input type="text" class="form-control" name="telp" id="telp" value="<?php echo $telp; ?>">
				</div>
				<div class="mb-3 col-lg-6">
					<label for="tahun" class="form-label">Alamat</label>
					<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>">
				</div>
				<input type="submit" class='btn btn-primary' name="UpdatePengarang" value="Update">

			</form>
		</div>
	</div>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['UpdatePengarang'])) {

		$id_pengarang = $_GET['id_pengarang'];
		$nama_pengarang = $_POST['nama_pengarang'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];

		include_once("../connect.php");

		$result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");

		header("Location:index.php");
	}
	?>


	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>