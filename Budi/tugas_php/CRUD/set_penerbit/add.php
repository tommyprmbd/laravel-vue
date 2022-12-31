<html>
<head>
	<title>Add Penerbit</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<?php
	include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");

?>
 
<body>
	<a class='btn btn-primary' href="penerbit.php">Go to penerbit</a>
	<br/><br/>
 
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 22rem; width: 25rem;">
 	<div class="card-header text-center"><a style="font-size: 15pt;">ADD DATA PENERBIT</a></div>
 	<div class="card-body">
	<form action="add.php" method="post" name="form1">
		
			<div class="mb-2 row">
				<p class="col-sm-5">ID Penerbit</p>
			<div class="col-sm-7">
				<input type="text" name="id_penerbit">
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Nama Penerbit</p>
			<div class="col-sm-7">
				<input type="text" name="nama_penerbit">
			</div>
			</div>
			
			<div class="mb-2 row"> 
				<p class="col-sm-5">Email</p>
			<div class="col-sm-7">
				<input type="text" name="email">
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Telp</p>
			<div class="col-sm-7">
				<input type="text" name="telp">
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Alamat</p>
			<div class="col-sm-7">
				<input type="text" name="alamat">
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
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
			
			header("Location:penerbit.php");
		}
	?>
</div>
</div>
</body>
</html>