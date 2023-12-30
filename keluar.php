<?php
require 'proses/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM keluar");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">Barang Keluar</a>
        <!-- Sidebar Toggle-->
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-bar-chart-fill"></i></div> Stock Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-arrow-down-circle-fill"></i></div> Barang
                            Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-arrow-up-circle-fill"></i></i></div> Barang
                            Keluar
                        </a>
                        <a class="nav-link" href="keloladm.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></i></div> Kelola Admin
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Barang Keluar</h1>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalTambah"> Tambah Barang Keluar</button>
                            <a href="export_keluar.php" class="btn btn-info">Export Data</a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id_Keluar</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal</th>
                                        <th>Penerima</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn, "select * from keluar k, stock s where s.idbarang = k.idbarang");
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                        $no++;
                                        $idmasuk = $data['idkeluar'];
                                        $namabarang = $data['namabarang'];
                                        $tanggal = $data['tanggal'];
                                        $penerima = $data['penerima'];
                                        $qty = $data['qty'];
                                        $satuan = $data['satuan'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no; ?>
                                            </td>
                                            <td>
                                                <?= $idmasuk; ?>
                                            </td>
                                            <td>
                                                <?= $namabarang; ?>
                                            </td>
                                            <td>
                                                <?= $tanggal; ?>
                                            </td>
                                            <td>
                                                <?= $penerima; ?>
                                            </td>
                                            <td>
                                                <?= $qty; ?>
                                            </td>
                                            <td>
                                                <?= $satuan; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#ModalEdit<?php echo $no ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Modal edit data barang  -->
                                                <div class="modal fade" id="ModalEdit<?php echo $no ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Barang
                                                                    Keluar </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="proses/ubah_keluar_barang.php">
                                                                <input type="hidden" name="tanggal"
                                                                    value="<?php echo $data['tanggal'] ?>">
                                                                <input type="hidden" name="idkeluar"
                                                                    value="<?php echo $data['idkeluar'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Id Keluar</label>
                                                                        <input type="number" class="form-control"
                                                                            value="<?php echo $data['idkeluar'] ?>"
                                                                            disabled>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Nama Barang</label>
                                                                        <input name="namabarang" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $data['namabarang'] ?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Jumlah</label>
                                                                        <input name="qty" type="number" class="form-control"
                                                                            value="<?php echo $data['qty'] ?>">
                                                                        <input name="oldqty" type="hidden"
                                                                            class="form-control"
                                                                            value="<?php echo $data['qty'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Satuan</label>
                                                                        <input name="satuan" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $data['satuan'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal edit data barang  -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#ModalHapus<?php echo $no ?>">
                                                    <i<i class="fa-solid fa-trash"></i>
                                                </button>
                                                <!-- Modal hapus data barang  -->
                                                <div class="modal fade" id="ModalHapus<?php echo $no ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalHapus">Hapus data barang
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="proses/hapus_barang_keluar.php">
                                                                <input type="hidden" name="idkeluar"
                                                                    value="<?php echo $data['idkeluar']; ?>">
                                                                <div class="modal-body"> Apakah anda yakin menghapus
                                                                    <?php echo $data['namabarang']; ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal hapus data barang  -->
                                            </td>
                                            <?php
                                    }
                                    ;
                                    ?>
                                    </tr>
                                </tbody>
                                </tr>
                                <!-- Modal tambah data barang  -->
                                <div class="modal fade" id="ModalTambah" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="proses/tambah_barang_keluar.php">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <select name="barangnya" class="form-control">
                                                            <?php
                                                            $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                                                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                                                $namabarangnya = $fetcharray['namabarang'];
                                                                $idbarangnya = $fetcharray['idbarang'];
                                                                ?>
                                                                <option value="<?= $idbarangnya; ?>">
                                                                    <?= $namabarangnya; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="penerima" type="text" class="form-control"
                                                            placeholder="Penerima" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="qty" type="number" class="form-control"
                                                            placeholder="Quantity" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="sat" type="text" class="form-control"
                                                            placeholder="Satuan" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="addbarangkeluar">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal tambah data barang  -->
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>