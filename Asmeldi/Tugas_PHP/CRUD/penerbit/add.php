<html>

<head>
	<title>Add Penerbit</title>
</head>

<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>
<?php $project_location = "http://localhost/Tugas_PHP/CRUD";
$url = $project_location; ?>

<body>
	<a href="index.php">Go to Home</a>
	<br /><br />

	<form action="<?= $url; ?>/penerbit/add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>ISBN</td>
				<td><input type="text" name="id_penerbit"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama_penerbit"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="AddPenerbit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['AddPenerbit'])) {
		$id_penerbit = $_POST['id_penerbit'];
		$nama_penerbit = $_POST['nama_penerbit'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];


		include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");

		$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");

		header("Location:index.php");
	}
	?>
</body>

</html>