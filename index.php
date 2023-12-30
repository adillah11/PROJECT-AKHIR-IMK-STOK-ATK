<?php
require 'proses/koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email ='$email' and password='$password'");

    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        $_SESSION['log'] = 'true';
        header('location:../stock.php');
    } else {
        echo "<script>
        alert('Email atau password yang anda masukkan salah bro...!!')</script>";
    }
    ;
}
;

if (!isset($_SESSION['log'])) {

} else {
    header('location:stock.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-primary" style="background-color: #4941c0;">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center position-absolute top-50 start-50 translate-middle" style=" width:
            50rem;">
            <div class="card hidden border-0 shadow-lg my-5">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="text-center">
                        <img class="mb-4" src="assets/img/logo.png" width="200">
                    </div>
                    <form method="POST">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0" img
                            class="mb-4" src="assets/img/logo.png">
                        </div>
                        <button class="w-100 btn btn-primary" name="login"> Login </button>
                    </form>
                    <br>
                    <p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>