<?php
require "koneksi.php";

$iduser = $_POST['iduser'];

$sql = mysqli_query($conn, "DELETE FROM login WHERE iduser='$iduser'");

if ($sql) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location = '../keloladm.php';
        </script>";
} else {
        echo "<script>
                alert('Data gagal dihapus');
                window.location = '../keloladm.php';
        </script>";
}