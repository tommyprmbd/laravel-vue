<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$nik = $_POST['nik'];
	$nm_member = $_POST['nm_member'];
	$nohp = $_POST['nohp']; 
	$kota = $_POST['kota'];
	$provinsi = $_POST['provinsi'];
	$wn = $_POST['wn'];


	// Database connection
	$conn = new mysqli('localhost','root','','beestore');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(username, email, password, nik, nm_member, nohp, kota, provinsi, wn) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param($username, $email, $password, $nik, $nm_member, $nohp, $kota, $provinsi, $wn);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>