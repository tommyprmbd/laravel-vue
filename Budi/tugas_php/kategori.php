<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMI</title>

        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container d-flex justify-content-center mt-4">
        <div class="card shadow mt-4" style="width: 18rem">
            <div class="card-header">Penghitungan BMI</div>
            <div class="card-body">
                <form action="" method="get">

                    <div class="form-group">
                        <label>Nama Anda</label>
                        <input type="text" class="from-control-sm" name="NA" required> 
                    </div>

                    <div class="form-group mt-3">
                        <label>Tinggi Badan (cm)</label>
                        <input type="number" class="from-control-sm" name="TB" required> 
                    </div>

                    <div class="form-group mt-3">
                        <label>Berat Badan (kg)</label>
                        <input type="number" class="from-control-sm" name="BB" required>    
                    </div>
                    <div class="d-grid col-6 mx-auto mt-4">
                    <button type="submit" name="proses" class="btn btn-warning">Hitung</button>
                    </div>
                </form>
            </div>
        
<?php
    if (isset($_GET['proses'])) {
        $nm = $_GET['NA'];
        $ntb = $_GET['TB'];
        $bb = $_GET['BB'];

        $tb = $ntb/100;
        $hitung = $bb / ($tb * $tb);

        if ($hitung <= 18.5) {
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Nama Anda   : '.$nm.'<br>
                        Tinggi Badan: '.$ntb.' Cm<br>
                        Berat Badan : '.$bb.' Kg<br>
                        Nilai BMI   : '.number_format($hitung,1).' <br>
                        Keterangan  : Kurus
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
            </div>          
            ';

             }elseif($hitung <= 25){
          echo'
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Nama Anda   : '.$nm.'<br>
              Tinggi Badan: '.$ntb.' Cm<br>
              Berat Badan : '.$bb.' Kg<br>
              Nilai BMI   : '.number_format($hitung,1).'<br>
              Keterangan  : Normal
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
           </div>
           ';
        }elseif($hitung <= 27){
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Nama Anda   : '.$nm.'<br>
                Tinggi Badan: '.$ntb.' Cm<br>
                Berat Badan : '.$bb.' Kg<br>
                Nilai BMI   : '.number_format($hitung,1).'<br>
                Keterangan  : Gemuk
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }elseif($hitung > 27 ){
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Nama Anda   : '.$nm.'<br>
                Tinggi Badan: '.$ntb.' Cm<br>
                Berat Badan : '.$bb.' Kg<br>
                Nilai BMI   : '.number_format($hitung,1).'<br>
                Keterangan  : Obesitas
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }
    }
?>
    </div>
  </div>
  </body>
</html>