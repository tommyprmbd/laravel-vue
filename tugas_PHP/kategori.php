<?php 
	$nama = "Andreas";
	//tingginya dalam centimeter
	$tinggi = 167;
	$berat = 64;
	$bmi = $berat / ($tinggi/100) ** 2;
	$result;
	if ($bmi < 18.5) {
		$result = "kurus";
	} elseif ($bmi >= 18.5 && $bmi <= 22.99) {
		$result = "normal";
	} elseif ($bmi >= 23 && $bmi <= 29.99) {
		$result = "sedikit gemuk";
	} elseif ($bmi >= 30) {
		$result = "sangat gemuk";
	} else
	{
		$result = "";
	}

	
	echo "Halo, $nama nilai BMI anda adalah $result "; 
 ?>