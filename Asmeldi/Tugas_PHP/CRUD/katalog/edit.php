<html>

<head>
	<title>Edit Buku</title>
</head>

<?php
include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");
$id_katalog = $_GET['id_katalog'];

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

while ($katalog_data = mysqli_fetch_array($katalog)) {
	$id_katalog = $katalog_data['id_katalog'];
	$nama = $katalog_data['nama'];
}
?>
<?php $project_location = "http://localhost/Tugas_PHP/CRUD";
$url = $project_location; ?>

<body>
	<a href="index.php">Go to Home</a>
	<br /><br />

	<form action="<?= $url; ?>/katalog/edit.php?id_katalog=<?php echo $id_katalog; ?>" method="POST">
		<table width="25%" border="0">
			<tr>
				<td>Id Katalog</td>
				<td style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="UpdateKatalog" value="Update"></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['UpdateKatalog'])) {

		$id_katalog = $_GET['id_katalog'];
		$nama = $_POST['nama'];


		include_once("/xampp/htdocs/Tugas_PHP/CRUD/connect.php");

		$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'");

		header("Location:index.php");
	}
	?>
</body>

</html>