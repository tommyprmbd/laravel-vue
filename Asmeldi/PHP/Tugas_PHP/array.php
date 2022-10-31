<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php

    //mendapatkan file Json
    $array = file_get_contents("data.json");

    //Mendecode data,json
    $data = json_decode($array, True);

    ?>

    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="position: relative; left: 50px;">Daftar Nilai</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">kelas</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $d) {

                        // make logic for column score(nilai)
                        if ($d['nilai'] > 85) {
                            $nilai = "A";
                        } else if ($d['nilai'] >= 80) {
                            $nilai = "B";
                        } else if ($d['nilai'] >= 70) {
                            $nilai = "C";
                        } else if ($d['nilai'] >= 55) {
                            $nilai = "D";
                        } else {
                            $nilai = "E";
                        }

                        // old
                        $TL = $d['tanggal_lahir'];
                        $yL = $d['tanggal_lahir'][0] .  $d['tanggal_lahir'][1] . $d['tanggal_lahir'][2] .  $d['tanggal_lahir'][3];
                        $month_num = $d['tanggal_lahir'][5] .  $d['tanggal_lahir'][6];
                        $dL = $d['tanggal_lahir'][8] .  $d['tanggal_lahir'][9];
                        $YN = date('Y');
                        // Use mktime() and date() function to
                        // convert number to month name
                        $month_name = date("F", mktime(0, 0, 0, $month_num, 10));



                        $old = $YN - $yL; ?>

                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $dL . " " . $month_name . " " . $yL; ?> </td>
                            <td><?php echo $old; ?> Tahun</td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td><?php echo $d['kelas']; ?></td>
                            <td><?php echo $d['nilai']; ?></td>
                            <td><?php echo $nilai ?></td>
                        </tr>

                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>