<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{width:400px; text-align:center; margin: 20px;}
        table th { background-color: #34cceb; }
        tr:nth-child(even) {background-color: #cccccc;}
    </style>
</head>
<body>
    <form>
        <table border="2" cellspacing="1">
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>KELAS</th>
            </tr>
    
            <?php  for ($no = 1, $i=1, $a=10; $i<=10, $a>=1; $i++, $a--) { ?>
        
            <tr>
                <td> <?php echo $no; ?></td>
                <td><?php echo "Nama ke $i"; ?></td>
                <td><?php echo "Kelas ke $a"; ?></td>
            </tr>

            <?php $no++; } ?>    
        </table>
    </form>
</body>
</html>