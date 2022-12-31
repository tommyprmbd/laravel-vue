<html>
<head>
	<title>Edit Katalog</title>
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
	$id_katalog = $_GET['id_katalog'];

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id_katalog = $katalog_data['id_katalog'];
    	$nama = $katalog_data['nama'];
    }
?>
 
<body>
	<a class='btn btn-primary' href="katalog.php">Go to katalog</a>
	<br/><br/>
 	
 	<div class="container d-flex justify-content-center">
 	<div class="card shadow " style="height: 10rem; width: 24rem;">
 	<div class="card-header text-center">ID <a style="font-size: 11pt;"><?php echo $id_katalog; ?></a></div>
 	<div class="card-body">
	<form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		
			<div class="mb-2 row">
				<p class="col-sm-5">Nama</p>
			<div class="col-sm-7">
				<input type="text" name="nama" value="<?php echo $nama; ?>">
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

			$id_katalog = $_GET['id_katalog'];
			$nama = $_POST['nama'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET id_katalog = '$id_katalog', nama = '$nama' WHERE id_katalog = '$id_katalog';");
			
			header("Location:katalog.php");
		}
	?>
</div>
</div>
</body>
</html>