<?php  
include_once("koneksi.php");

$isbn = $_GET["isbn"];

// hapus data Buku
$result = mysqli_query($conn, "DELETE FROM buku WHERE isbn='$isbn'");

echo"<meta http-equiv='refresh', content='0, url=index.php'>";
?>


