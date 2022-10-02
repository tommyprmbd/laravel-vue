<?php

// data pasien
$nama        = "Ichsan Maulana";
$tinggiBadan = 176;
$beratBadan  = 55;

// Rumus Menghitung Nilai BMI
$tinggiBadan = $tinggiBadan / 100;
$nilaiBMI = $beratBadan / ($tinggiBadan * $tinggiBadan);

//Output 
if ($nilaiBMI <= 18 ) {
    echo "Halo, $nama. Nilai BMI anda $nilaiBMI, Anda termasuk kurus.";
}elseif ($nilaiBMI <= 25 ) {
    echo "Halo, $nama. Nilai BMI anda $nilaiBMI, Anda termasuk ideal.";
}elseif ($nilaiBMI <= 30 ) {
    echo "Halo, $nama. Nilai BMI anda $nilaiBMI, Anda termasuk gemuk.";
}else {
    echo "Halo, $nama. Nilai BMI anda $nilaiBMI, Anda sudah bisa di kurban.";
}


?>