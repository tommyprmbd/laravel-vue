<?php

$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("connection failed:" . mysqli_connect_error());
}
echo "connection successfully";



// method GET table buku
$sql = "SELECT * FROM buku";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "buku :" . $row['isbn'] . "" . $row['judul'] . "<br>";
    }
} else {
    echo "0 results";
}

echo "<br>";
echo "<br>";
echo "<br>";



// method GET table anggota
$sql = "SELECT * FROM anggota";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "anggota :" . $row['id_anggota'] . "" . $row['nama'] . "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($connection);
?>