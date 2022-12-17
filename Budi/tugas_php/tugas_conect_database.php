<?php
	//simpel koneksi
	$conn = new mysqli('localhost','root','','perpus');


$sql = "SELECT pengarang.id_pengarang, nama_pengarang, COUNT(pengarang.id_pengarang)'jumlah_buku'
		FROM pengarang
		left JOIN buku ON pengarang.id_pengarang = buku.id_pengarang
		GROUP BY pengarang.id_pengarang";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()){
		echo "ID : " . $row["id_pengarang"]. "  Nama : " . $row["nama_pengarang"]. "  jumlah buku : " . $row["jumlah_buku"]. "<br>";
	}
} else {
	echo "0 results";
}
$conn->close();

?>