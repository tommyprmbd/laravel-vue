<html>
<head>
	<title>Edit Katalog</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
	include_once("../connect.php");
	$id_katalog = $_GET['id_katalog'];

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id_katalog = $katalog_data['id_katalog'];
    	$nama = $katalog_data['nama'];
    }
?>
 
<body>
	<div class="container mt-4">
		<a class='btn btn-primary' href="katalog.php">Go to Home</a>
		<div class="row mt-3">
			<form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="POST">
				<div class="mb-3 col-lg-2">
					<label for="id" class="form-label">ID</label>
					<input type="text" class="form-control" value="<?php echo $id_katalog; ?>">
				</div>
				<div class="mb-3 col-lg-2">
					<label for="nama" class="form-label">Nama Pengarang</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
				</div>
				<input type="submit" class='btn btn-primary' name="update" value="Update">
			</form>
		</div>
	</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_katalog = $_GET['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog';");
			
			header("Location:katalog.php");
		}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>