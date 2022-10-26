<html>

<head>
	<title>Add katalog</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
<?php $project_location = "http://localhost/Tugas_PHP/CRUD";
$url = $project_location; ?>

<body>

	<div class="container mt-5">
		<a class='btn btn-primary' href="index.php">Go to Home</a>
		<div class="row mt-3">
			<form action="<?= $url; ?>/katalog/add.php" method="post" name="form1">
				<div class="mb-3 col-lg-2">
					<label for="tahun" class="form-label">Id Katalog</label>
					<input type="text" class="form-control" name="id_katalog" id="id_katalog">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="tahun" class="form-label">Nama Katalog</label>
					<input type="text" class="form-control" name="nama_katalog" id="nama_katalog">
				</div>
				<input type="submit" class='btn btn-primary' name="AddKatalog" value="Add">

			</form>
		</div>
	</div>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['AddKatalog'])) {
		$id_katalog = $_POST['id_katalog'];
		$nama_katalog = $_POST['nama_katalog'];

		include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");

		$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama_katalog');");

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