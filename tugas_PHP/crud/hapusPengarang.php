<?php 

include_once("koneksi.php");
$id_pengarang = $_GET["id_pengarang"];

// hapus data pengarang
$result1 = mysqli_query($conn, "DELETE FROM pengarang WHERE id_pengarang='$id_pengarang'");

echo"<meta http-equiv='refresh', content='0, url=pengarang.php'>";

?>