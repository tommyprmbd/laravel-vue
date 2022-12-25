<html>
<head>
	<title>Edit Pengarang</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<?php
	include_once("../connect.php");
	$id_pengarang = $_GET['id_pengarang'];

    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
    	$id_pengarang = $pengarang_data['id_pengarang'];
    	$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email = $pengarang_data['email'];
    	$telp = $pengarang_data['telp'];
    	$alamat = $pengarang_data['alamat'];
    }
?>
 
<body>
	<a class='btn btn-primary' href="pengarang.php">Go to pengarang</a>
	<br/><br/>
 	
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 19rem; width: 24rem;">
 	<div class="card-header text-center">ID <a style="font-size: 11pt;"><?php echo $id_pengarang; ?></a></div>
 	<div class="card-body">
	<form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
			
			<div class="mb-2 row"> 
				<p class="col-sm-5">Nama</p>
			<div class="col-sm-7">
				<input type="text" name="nama" value="<?php echo $nama_pengarang; ?>">	
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
				<button type="submit" class="btn btn-primary">Update</button>	
			</div>
	</form>
	</div>	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_pengarang = $_GET['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE pengarang SET id_pengarang = '$id_pengarang', nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");
			
			header("Location:pengarang.php");
		}
	?>
</div>
</div>
</body>
</html>