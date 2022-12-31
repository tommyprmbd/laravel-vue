<html>
<head>
	<title>Edit Penerbit</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<?php
	include_once("../connect.php");
	$id_penerbit = $_GET['id_penerbit'];

    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    	$id_penerbit = $penerbit_data['id_penerbit'];
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>
 
<body>
	<a class='btn btn-primary' href="penerbit.php">Go to penerbit</a>
	<br/><br/>
 
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 20rem; width: 25rem;">
 	<div class="card-header text-center">ID <a style="font-size: 12pt;"><?php echo $id_penerbit; ?></a></div>
 	<div class="card-body">
	<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		
			<div class="mb-2 row">
				<p class="col-sm-5">Nama</p>
			<div class="col-sm-7">
				<input type="text" name="nama" value="<?php echo $nama_penerbit; ?>">
			</div>
			</div>
			
			<div class="mb-2 row"> 
				<p class="col-sm-5">Email</p>
			<div class="col-sm-7">
				<input type="text" name="email" value="<?php echo $email; ?>">
			</div>
			</div>

			
			<div class="mb-2 row"> 
				<p class="col-sm-5">Telp</p>
			<div class="col-sm-7">
				<input type="text" name="telp" value="<?php echo $telp; ?>">
			</div>
			</div>

			
			<div class="mb-2 row"> 
				<p class="col-sm-5">alamat</p>
			<div class="col-sm-7">
				<input type="text" name="alamat" value="<?php echo $alamat; ?>">
			</div>
			</div>

			
			<div class="mb-2 row"> 
				<button name="submit" class="btn btn-primary">Update</button>	
			</div>
	</form>
	</div>
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['submit'])) {

			$id_penerbit = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</div>
</div>
</body>
</html>