<?php
$n = "Asmeldi";
$tb = 172 / 100;
$bb = 75;

$bmi = $bb / ($tb * $tb);

echo '<div class="hasil" >' . $bmi;
echo "<h3>Hasil perhitungan BMI</h3>";
echo "Nama Anda: $n<br>";
echo "Tinggi Badan: $tb meter<br>";
echo "Berat Badan: $bb kilogram<br>";
echo "<hr>BMI Anda: " . number_format($bmi);
echo "<h4>Kesimpulan:</h4>";

if ($bmi < 18.5) {
    echo "Hallo" . $n . " nilai BMI anda adalah " . number_format($bmi) . "  Anda termasuk Kurus";
} elseif ($bmi < 25) {
    echo "Hallo" . $n . " nilai BMI anda adalah " . number_format($bmi) . "  Anda termasuk Sedang";
} elseif ($bmi < 30) {
    echo "Hallo" . $n . " nilai BMI anda adalah " . number_format($bmi) . "  Anda termasuk Gemuk";
} else {
    echo "Hallo" . $n . " nilai BMI anda adalah " . number_format($bmi) . "  Obesitas Level Akut";
}

?>