<?php 

include_once("koneksi.php");
$id_penerbit = $_GET["id_penerbit"];

// hapus data penerbit
$result1 = mysqli_query($conn, "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'");

echo"<meta http-equiv='refresh', content='0, url=penerbit.php'>";

?>