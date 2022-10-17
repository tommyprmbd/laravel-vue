<?php 

//mendapatkan file Json
$array = file_get_contents("data.json");

//Mendecode data,json
$data = json_decode($array, True);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <style>
        .judul{
            width: 100%;
            background-color: orange;
            padding: 15px 0 15px 0;
            text-align: center;
        }
        .container{
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .tr:nth-child(odd){
            background-color: #ddd;
        }
        .th{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <h2 class="judul">Daftar Nilai</h2>
    <div class="container">
    <table border="1" cellpadding="15" cellspacing="0" >
        <thead>
            <tr class="th">
                <th>No.</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Hasil</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no=1;
            foreach ($data as $dt) { 

            $nilai = $dt['nilai'];
            if ($nilai >= 90) {
                $hasil = "A";
            } elseif ( $nilai >= 80){
                $hasil = "B";
            }elseif ($nilai >= 70) {
                $hasil = "C";
            }elseif ($nilai >= 50) {
                $hasil = "D";
            }elseif ($nilai >= 40) {
                $hasil = "E";
            }


            $tgl_lahir = $dt['tanggal_lahir'];
            $lahir = new DateTime($tgl_lahir);
            $now = new DateTime();

            $usia = $now ->diff($lahir)->y;
            
            ?>
                <tr class="tr">
                    <td><?= $no++; ?></td>
                    <td><?= $dt["nama"]; ?></td>
                    <td><?= date('d M Y', strtotime( $dt["tanggal_lahir"])); ?></td>
                    <td><?= $usia." Tahun" ?></td>
                    <td><?= $dt["alamat"]; ?></td>
                    <td><?= $dt["kelas"]; ?></td>
                    <td><?= $dt["nilai"]; ?></td>
                    <td><?= $hasil ?></td>
                </tr>


            <?php 
             } ?>
                
        </tbody>
    </table>
    </div>
</body> 
</html>