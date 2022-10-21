<?php 
    echo "<table border = 1>";
    echo "<tr>";
    echo "<td align = center>No</td> <td align = center>Nama</td> <td align = center>Kelas</td>";
    echo "</tr>";
    for ($i=1; $i <11 ; $i++) {
         $j=10;
         $k=$i - 1;
         $l=$j - $k;
         echo "<tr>";
         echo "<td align = center>$i</td> <td align = center>Nama ke $i</td> <td align = center>Kelas $l</td>";
         echo "</tr>"; 
    }
    echo "</table>";
 ?>