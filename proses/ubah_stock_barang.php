<?php
require "koneksi.php";

$idbarang = $_POST['idbarang'];
$namabarang = $_POST['namabarang'];
$satuan = $_POST['satuan'];

if (empty($namabarang) || $namabarang == "") {
    echo "<script>
                alert('Maaf, data tidak boleh kosong');
                window.location = '../stock.php';
            </script>";
} else {
    $sql = mysqli_query($conn, "update stock set namabarang='$namabarang',satuan='$satuan' where idbarang='$idbarang'");
    if ($sql)
        echo "<script>
                alert('Data berhasil diubah');
                window.location = '../stock.php';
        </script>";
}