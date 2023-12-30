<?php
require 'koneksi.php';
//tambah barang baru
if (isset($_POST['addnewbarang'])) {
    $namabarang = $_POST['namabarang'];
    $stock = $_POST['stock'];
    $sat = $_POST['sat'];

    $addtotable = mysqli_query($conn, "insert into stock (namabarang, stock, satuan) values ('$namabarang','$stock', '$sat')");

    if ($addtotable) {
        header('location:../stock.php');
    } else {
        echo 'gagal';
        header('location:../stock.php');
    }
}

?>