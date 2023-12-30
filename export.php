<?php
require 'proses/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM stock");
?>
<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Stock Barang</h2>
        <div class="data-tables datatable-dark">
            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table id="example" width="100%" cellspasing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id_Barang</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ambilsemuadatastock = mysqli_query($conn, "SELECT * from stock");
                    $no = 0;
                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                        $no++;
                        $idbarang = $data['idbarang'];
                        $namabarang = $data['namabarang'];
                        $stock = $data['stock'];
                        $satuan = $data['satuan'];
                        ?>
                        <tr>
                            <td>
                                <?= $no; ?>
                            </td>
                            <td>
                                <?php echo $idbarang; ?>
                            </td>
                            <td>
                                <?php echo $namabarang; ?>
                            </td>
                            <td>
                                <?php echo $stock; ?>
                            </td>
                            <td>
                                <?php echo $satuan; ?>
                            </td>
                            </td>
                        </tr>
                        <?php
                    }
                    ;
                    ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'printHtml5',
                ]
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="ttps://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
</body>

</html>