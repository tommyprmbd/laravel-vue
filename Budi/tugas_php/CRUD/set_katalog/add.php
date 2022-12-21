<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

?>
 
<body>
	<a href="katalog.php">Go back</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Katalog
				<td><input type="text" name="id_katalog"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama_katalog"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog = $_POST['id_katalog'];
			$nama_katalog = $_POST['nama_katalog'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama_katalog`) VALUES ('$id_katalog', '$nama_katalog');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>