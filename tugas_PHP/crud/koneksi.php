<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "perpus";

$conn = mysqli_connect($servername, $username, $password, $database);

//cek koneksi
if(!$conn){
    die("koneksi Gagal : " . mysqli_connect_error());
}

?>