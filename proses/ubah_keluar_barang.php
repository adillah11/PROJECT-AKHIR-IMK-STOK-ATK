<?php
require "koneksi.php";

// Ambil data dari formulir
$idkeluar = $_POST['idkeluar'];
$namabarang = $_POST['namabarang'];
$qty = $_POST['qty'];
$oldqty = $_POST['oldqty'];
$satuan = $_POST['satuan'];
$tanggal = $_POST['tanggal'];

// Tanggal hari ini
$tanggal_hari_ini = date('Y-m-d');

$tanggal_hanya = date('Y-m-d', strtotime($tanggal));

// Membandingkan tanggal barang dengan tanggal hari ini
if ($tanggal_hanya == $tanggal_hari_ini) {
    if (empty($qty) || $qty == "") {
        echo "<script>
                alert('Maaf, data tidak boleh kosong');
                window.location = '../keluar.php';
            </script>";
    } else {
        // Cari ID barang berdasarkan nama barang
        $sql = mysqli_query($conn, "SELECT * FROM stock WHERE namabarang = '$namabarang'");
        $data_idbarang = mysqli_fetch_assoc($sql);


        if ($data_idbarang) {
            $jumlah_brang_sebelum_edit = $data_idbarang["stock"] + $oldqty;
            $jumlah_brang_sebelum_edit = $jumlah_brang_sebelum_edit - $qty;

            $idbarang = $data_idbarang['idbarang'];

            // Update data barang keluar
            $sql = mysqli_query($conn, "UPDATE keluar SET qty='$qty', satuan='$satuan' WHERE idkeluar='$idkeluar'");

            $sql = mysqli_query($conn, "UPDATE stock SET stock='$jumlah_brang_sebelum_edit'  WHERE idbarang='$idbarang'");

            if ($sql) {
                echo "<script>
                alert('Data berhasil diubah');
                window.location = '../keluar.php';
            </script>";
            } else {
                echo "<script>
                alert('Terjadi kesalahan saat mengubah data');
                window.location = '../keluar.php';
            </script>";
            }
        } else {
            echo "<script>
                alert('Nama barang tidak ditemukan');
                window.location = '../keluar.php';
            </script>";
        }
    }
} else {
    echo "<script>
                alert('Tanggal barang tidak sama dengan tanggal hari ini.');
                window.location = '../keluar.php';
            </script>";
}