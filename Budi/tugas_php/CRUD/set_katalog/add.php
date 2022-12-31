<html>
<head>
	<title>Add Katalog</title>
	<title>Add Pengarang</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

?>
 
<body>
	<a class='btn btn-primary' href="katalog.php">Go to katalog</a>
	<br/><br/>
 
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 15rem; width: 24rem;">
 	<div class="card-header text-center"><a style="font-size: 15pt;">ADD DATA KATALOG</a></div>
 	<div class="card-body">
	<form action="add.php" method="post" name="form1">
		
			<div class="mb-2 row">
				<p class="col-sm-5">ID Katalog</p>
			<div class="col-sm-7">
				<input type="text" name="id_katalog">
			</div>
			</div>

			<div class="mb-2 row"> 
				<p class="col-sm-5">Nama</p>
			<div class="col-sm-7">
				<input type="text" name="nama">
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
			$id_katalog = $_POST['id_katalog'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
			
			header("Location:katalog.php");
		}
	?>
</div>
</div>
</body>
</html>