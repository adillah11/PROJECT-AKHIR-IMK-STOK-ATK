<?php
require "koneksi.php";

$idbarang = $_POST['idbarang'];

try {
        $sql = mysqli_query($conn, "DELETE FROM stock WHERE idbarang='$idbarang'");

        if ($sql) {
                echo "<script>
                alert('Data berhasil dihapus');
                window.location = '../stock.php';
        </script>";
        } else {
                echo "<script>
                alert('Data gagal dihapus');
                window.location = '../stock.php';
        </script>";
        }
} catch (\Throwable $th) {
        echo "<script>
                alert('Data gagal dihapus');
                window.location = '../stock.php';
        </script>";
}