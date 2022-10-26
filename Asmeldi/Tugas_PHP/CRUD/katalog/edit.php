<html>

<head>
	<title>Edit Katalog</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$id_katalog = $_GET['id_katalog'];

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

while ($katalog_data = mysqli_fetch_array($katalog)) {
	$id_katalog = $katalog_data['id_katalog'];
	$nama = $katalog_data['nama'];
}
?>
<?php $project_location = "http://localhost/Tugas_PHP/CRUD";
$url = $project_location; ?>

<body>

	<div class="container mt-5">
		<a class='btn btn-primary' href="index.php">Go to Home</a>
		<div class="row mt-3">
			<form action="<?= $url; ?>/katalog/edit.php?id_katalog=<?php echo $id_katalog; ?>" method="POST">
				<div class="mb-3 col-lg-2">
					<label for="tahun" class="form-label">Id Katalog</label>
					<input type="text" class="form-control" value="<?php echo $id_katalog; ?>">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="tahun" class="form-label">Nama Katalog</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
				</div>
				<input type="submit" class='btn btn-primary' name="UpdateKatalog" value="Update">


			</form>
		</div>
	</div>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['UpdateKatalog'])) {

		$id_katalog = $_GET['id_katalog'];
		$nama = $_POST['nama'];


		include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");

		$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'");

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