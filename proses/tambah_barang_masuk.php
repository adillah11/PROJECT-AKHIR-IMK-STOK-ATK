<?php
require 'koneksi.php';
//menambah barang masuk

if (isset($_POST['addbarangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];

    $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang = '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang + $qty;

    $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, penerima, qty, satuan) values ('$barangnya', '$penerima', '$qty', '$satuan')");
    $updatestockmasuk = mysqli_query($conn, "update stock set stock = '$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location:../masuk.php');
    } else {
        echo 'Gagal';
        header('location:../masuk.php');
    }

}
?>