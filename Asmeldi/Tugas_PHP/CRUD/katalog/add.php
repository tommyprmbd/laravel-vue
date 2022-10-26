<html>

<head>
	<title>Add katalog</title>
</head>

<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
<?php $project_location = "http://localhost/Tugas_PHP/CRUD";
$url = $project_location; ?>

<body>
	<a href="index.php">Go to Home</a>
	<br /><br />

	<form action="<?= $url; ?>/katalog/add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>ISBN</td>
				<td><input type="text" name="id_katalog"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama_katalog"></td>
			</tr>


			<tr>
				<td></td>
				<td><input type="submit" name="AddKatalog" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['AddKatalog'])) {
		$id_katalog = $_POST['id_katalog'];
		$nama_katalog = $_POST['nama_katalog'];

		include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");

		$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama_katalog');");

		header("Location:index.php");
	}
	?>
</body>

</html>