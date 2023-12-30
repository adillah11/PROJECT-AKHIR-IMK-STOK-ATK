<?php
require 'koneksi.php';

if (isset($_POST['idmasuk'])) {
        $idmasuk = $_POST['idmasuk'];
        $idbarang = $_POST['idbarang'];

        // Update stok
        $query_update_stok = "UPDATE stock SET stock = stock - (SELECT qty FROM masuk WHERE idmasuk = $idmasuk) WHERE idbarang = $idbarang";
        if (mysqli_query($conn, $query_update_stok)) {
                echo "success";
                // Hapus data barang masuk
                $query = "DELETE FROM masuk WHERE idmasuk = $idmasuk";

                if (mysqli_query($conn, $query)) {
                        echo "<script>
                alert('Data berhasil dihapus');
                window.location = '../masuk.php';
        </script>";
                } else {
                        echo "error: " . mysqli_error($conn);
                }
        } else {
                echo "error: " . mysqli_error($conn);
        }

} else {
        echo "Parameter idmasuk tidak ditemukan.";
}
?>