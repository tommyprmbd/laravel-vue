<?php 
	$servername = "localhost";
	$database = "perpus";
	$username = "root";
	$password = "";

	//create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	//check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//echo "Connected Successfully";
	//mysqli_close($conn);

	// sql query 1
	$sql = "SELECT * FROM `buku` ";
	$result = $conn->query($sql);

	echo "<b>List buku :<br><br></b>";
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			echo "Buku : ". $row["isbn"]. " ". $row["judul"]. "<br>";
		}
	} else {
		echo "0 Result";
	}
	echo "<hr><br>";

	//sql query 2
	$sql = "SELECT * FROM `anggota` WHERE nama <> 'Administrator' ";
	$result = $conn->query($sql);

	echo "<b>List anggota :<br><br></b>";
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			echo "Nama : ". $row["nama"]. "<br>";
			echo "Alamat : ". $row["alamat"]. "<br>";
			echo "<hr style = 'width : 250px; margin-left : 0px;'>";
		}
	} else {
		echo "0 Result";
	}

	$conn->close();
 ?>