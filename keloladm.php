<?php
require 'proses/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM login");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kelola Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">Stok Barang</a>
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
                    <h1 class="mt-4">Kelola Admin</h1>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header"> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalTambah"> Tambah Admin</button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id_User</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Hp</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id_User</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Hp</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $ambilsemuadataadmin = mysqli_query($conn, "SELECT * from login");
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($ambilsemuadataadmin)) {
                                        $no++;
                                        $iduser = $data['iduser'];
                                        $nama = $data['nama'];
                                        $email = $data['email'];
                                        $jk = $data['jk'];
                                        $nohp = $data['nohp'];
                                        $jabatan = $data['jabatan'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no; ?>
                                            </td>
                                            <td>
                                                <?= $iduser; ?>
                                            </td>
                                            <td>
                                                <?= $nama; ?>
                                            </td>
                                            <td>
                                                <?= $email; ?>
                                            </td>
                                            <td>
                                                <?= $jk; ?>
                                            </td>
                                            <td>
                                                <?= $nohp; ?>
                                            </td>
                                            <td>
                                                <?= $jabatan; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#ModalEdit<?php echo $no ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <!-- Modal edit data admin  -->
                                                <div class="modal fade" id="ModalEdit<?php echo $no ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Admin
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="proses/ubah_admin.php">
                                                                <input type="hidden" name="iduser"
                                                                    value="<?php echo $data['iduser'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Id User</label>
                                                                        <input type="number" class="form-control"
                                                                            value="<?php echo $data['iduser'] ?>" disabled>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Nama</label>
                                                                        <input name="nama" type="text" class="form-control"
                                                                            value="<?php echo $data['nama'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">No Hp</label>
                                                                        <input name="nohp" type="number"
                                                                            class="form-control"
                                                                            value="<?php echo $data['nohp'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Jabatan</label>
                                                                        <input name="jabatan" type="text"
                                                                            class="form-control"
                                                                            value="<?php echo $data['jabatan'] ?>">
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
                                                <!-- Akhir Modal edit data admin  -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#ModalHapus<?php echo $no ?>">
                                                    <i<i class="fa-solid fa-trash"></i>
                                                </button>
                                                <!-- Modal hapus data admin -->
                                                <div class="modal fade" id="ModalHapus<?php echo $no ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalHapus">Hapus data Admin
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="proses/hapus_admin.php">
                                                                <input type="hidden" name="iduser"
                                                                    value="<?php echo $data['iduser']; ?>">
                                                                <div class="modal-body"> Apakah anda yakin menghapus
                                                                    <?php echo $data['nama']; ?>
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
                                                <!-- Akhir Modal hapus data admin  -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ;
                                    ?>
                                </tbody>
                                <!-- Modal tambah Admin  -->
                                <div class="modal fade" id="ModalTambah" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="proses/tambah_admin.php">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input name="nama" type="text" class="form-control"
                                                            placeholder="Nama Admin" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="email" type="text" class="form-control"
                                                            placeholder="Email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="password" type="text" class="form-control"
                                                            placeholder="password" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="jk" type="text" class="form-control"
                                                            placeholder="Jenis Kelamin" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="nohp" type="number" class="form-control"
                                                            placeholder="No Hp" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="jabatan" type="text" class="form-control"
                                                            placeholder="Jabatan" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="addadmin">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal tambah data admin  -->
                                </tbody>
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