<?php
require 'koneksi.php';

// Periksa apakah ada pengiriman data dari formulir
if (isset($_POST['editmasukbarang'])) {
    $idmasuk = $_POST['idmasuk'];
    $stok_action = $_POST['stok_action'];
    $quantity = $_POST['quantity'];
    $penerima = $_POST['penerima'];
    $tanggal = date("Y-m-d"); // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD

    $tanggal = $_POST['tanggal'];

    // Tanggal hari ini
    $tanggal_hari_ini = date('Y-m-d');

    $tanggal_hanya = date('Y-m-d', strtotime($tanggal));

    // Membandingkan tanggal barang dengan tanggal hari ini
    if ($tanggal_hanya == $tanggal_hari_ini) {
        // Ambil data masuk barang berdasarkan ID masuk
        $query = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk = '$idmasuk'");
        $data_masuk = mysqli_fetch_assoc($query);

        // Ambil data stock barang berdasarkan ID barang
        $querystockbarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$data_masuk[idbarang]'");
        $data_masukstockbarang = mysqli_fetch_assoc($querystockbarang);

        if (!$data_masuk) {
            // Data masuk tidak ditemukan, mungkin berikan pesan kesalahan atau tindakan lain sesuai kebutuhan
            echo "Data masuk tidak ditemukan.";
        }

        // Hitung jumlah yang akan ditambah atau dikurangkan berdasarkan aksi
        if ($stok_action == 'tambah') {
            $new_qty = $data_masuk['qty'] + $quantity;

            $newstockbarang = $data_masukstockbarang['stock'] + $quantity;
        } elseif ($stok_action == 'kurang') {
            // Pastikan jumlah yang dikurangkan tidak melebihi jumlah yang ada
            if ($quantity > $data_masuk['qty']) {
                echo "Jumlah yang dikurangkan melebihi stok yang tersedia.";
                exit();
            }
            $new_qty = $data_masuk['qty'] - $quantity;

            $newstockbarang = $data_masukstockbarang['stock'] - $quantity;
        } else {
            // Aksi tidak valid
            echo "Aksi tidak valid.";
            exit();
        }

        // Update data masuk barang
        $update_query = mysqli_query($conn, "UPDATE masuk SET qty = '$new_qty', penerima = '$penerima' WHERE idmasuk = '$idmasuk'");

        $update_query = mysqli_query($conn, "UPDATE stock SET stock = '$newstockbarang' WHERE idbarang = '$data_masuk[idbarang]'");

        // if ($data_masuk['tanggal'] == $tanggal) {
        //     // Tanggal masuk sama dengan tanggal hari ini, lanjutkan dengan perubahan
        // } else {
        //     echo "Anda hanya dapat mengubah data masuk untuk tanggal hari ini.";
        //     exit();
        // }
        echo $newstockbarang;

        if ($update_query) {
            // Pengeditan berhasil
            header('Location: ../masuk.php'); // Redirect kembali ke halaman masuk barang
        } else {
            // Terjadi kesalahan saat pengeditan
            echo "Terjadi kesalahan saat mengedit data masuk.";
        }
    } else {
        echo "<script>
                alert('Tanggal barang tidak sama dengan tanggal hari ini.');
                window.location = '../masuk.php';
            </script>";
    }



}

?>