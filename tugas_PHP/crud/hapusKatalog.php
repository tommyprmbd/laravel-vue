<?php 

include_once("koneksi.php");
$id_katalog = $_GET["id_katalog"];

// hapus data katalog
$result3 = mysqli_query($conn, "DELETE FROM katalog WHERE id_katalog='$id_katalog'");

echo"<meta http-equiv='refresh', content='0, url=katalog.php'>";

?>