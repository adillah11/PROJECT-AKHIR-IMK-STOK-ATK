<?php
require 'koneksi.php';
if (isset($_POST['addadmin'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $nohp = $_POST['nohp'];
    $jabatan = $_POST['jabatan'];

    $queryinsert = mysqli_query($conn, "insert into login (nama, email, password, jk, nohp, jabatan) values ('$nama','$email','$password', '$jk', '$nohp', '$jabatan')");
    if ($queryinsert) {
        header('location:../keloladm.php');
    } else {
        header('location:../keloladm.php');
    }
}

?>