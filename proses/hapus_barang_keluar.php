<?php
require "koneksi.php";

$idkeluar = $_POST['idkeluar'];

$sql = mysqli_query($conn, "DELETE FROM keluar WHERE idkeluar='$idkeluar'");

if ($sql) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location = '../keluar.php';
        </script>";
} else {
        echo "<script>
                alert('Data gagal dihapus');
                window.location = '../keluar.php';
        </script>";
}