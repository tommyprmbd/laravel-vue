<html>
<head>
	<title>Add Katalog</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body style="background-color: #F3F9F9;">
	<div class="container mt-5">
		<center>
			<a class='btn btn-primary' href="katalog.php">Go to Home</a>
			<div class="row mt-3">
				<form action="add.php" method="post" name="form1">

					<div class="mb-3 col-lg-2">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" name="id_katalog" id="id_katalog">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="nama" class="form-label">Nama Katalog</label>
						<input type="text" class="form-control" name="nama" id="nama">
					</div>
					<input type="submit" class='btn btn-primary' name="Submit" value="Add">
				</form>
			</div>
		</center>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog = $_POST['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
			
			header("Location:katalog.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>