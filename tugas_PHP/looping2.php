<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" style="text-align: center;">
        <tr style="background-color: lightblue;">
            <th>No.</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
       

        <?php 
        for ($i=1, $b=1, $c=10; 
             $i<= 10, $b <=10, $c >=1; 
             $i++, $b++, $c--) 
             { ?>

        <tr bgcolor='<?php 
        if ($i % 2 == 1) {
            echo"#ddd";
        }else{
            echo "#fff";
        } ?> '>
            <td><?= $i ?></td>
            <td><?= "Nama Ke $b" ?></td>
            <td><?= "Kelas $c" ?></td>
        </tr>

        <?php } ?>

    </table>
</body>
</html>