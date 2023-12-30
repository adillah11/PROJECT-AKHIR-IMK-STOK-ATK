<?php
require 'koneksi.php';
//menambah barang keluar
if (isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    $sat = $_POST['sat'];

    $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang = '$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];


    if ($stocksekarang >= $qty) {

        $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

        $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, penerima, qty, satuan) values ('$barangnya', '$penerima', '$qty','$sat')");
        $updatestockkeluar = mysqli_query($conn, "update stock set stock = '$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
        if ($addtomasuk && $updatestockmasuk) {
            header('location:../keluar.php');
        } else {
            echo 'Gagal';
            header('location:../keluar.php');
        }
    } else {
        // kalau barangnya ga cukup
        echo '
	<script>
		alert("Maaf, stok saat ini tidak mencukupi");
		window.location.href="../keluar.php";
	</script>';
    }
}
?>