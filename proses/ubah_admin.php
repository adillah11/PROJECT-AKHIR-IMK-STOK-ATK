<?php
require "koneksi.php";

$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$jabatan = $_POST['jabatan'];

if (empty($nama) || $nama == "") {
    echo "<script>
                alert('Maaf, data tidak boleh kosong');
                window.location = '../keloladm.php';
            </script>";
} else {
    $sql = mysqli_query($conn, "update login set nama='$nama',nohp='$nohp', jabatan='$jabatan' where iduser='$iduser'");
    if ($sql)
        echo "<script>
                alert('Data berhasil diubah');
                window.location = '../keloladm.php';
        </script>";
}