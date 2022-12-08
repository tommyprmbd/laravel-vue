
<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <title>BeeStore Register</title>
</head>
<body>
    <!--kotak regis-->
    <div class="container d-flex justify-content-center mt-4">

        <form action="config.php" method="POST">
            <p style="font-size: 2rem; font-weight: 800;">NEW MEMBER HARAP REGISTRASI DULU</p>
            <div>
                <input class="form-control form-control-sm" type="text" placeholder="Username" aria-label=".form-control-sm" name="username">
            </div>
            <div class="mt-3">
                <input class="form-control form-control-sm" type="text" placeholder="Email" aria-label=".form-control-sm example" name="email">
            <div class="mt-3">
                <input class="form-control form-control-sm" type="password" placeholder="Password" aria-label=".form-control-sm example" name="password">
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="NIK" aria-label=".form-control-sm example" name="nik">
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="Nama Anda" aria-label=".form-control-sm example" name="nm_member" >
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="No Hp" aria-label=".form-control-sm example" name="nohp" >
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="Kota Anda" aria-label=".form-control-sm example" name="kota" >
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="Provinsi Anda " aria-label=".form-control-sm example" name="provinsi" >
            </div>
            <div class="mt-3">
               <input class="form-control form-control-sm" type="text" placeholder="Warga Negara " aria-label=".form-control-sm example" name="wn" >
            </div>

           
            <div class="mt-3">
                <button name="lanjut" class="btn btn-primary">Register</button>
            </div>
            <p class="text-center">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>

    </div>
</body>
</html>