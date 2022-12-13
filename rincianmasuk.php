<?php

require 'function.php';
require 'cek.php';

//get data 
//ambil data total
$get = mysqli_query($conn,"select * from rincianmasuk");
$count = mysqli_num_rows($get);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BARANG KELUAR</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">STOCK BARANG</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DASHBOARD
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                TAMBAH ITEM BARU
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                TAMBAH STOCK BARANG
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                BARANG KELUAR
                            </a>
                            <a class="nav-link" href="retur.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                BARANG RETUR
                            </a>
                            <a class="nav-link" href="rincianmasuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                RINCIAN BARANG MASUK
                            </a>
                            <a class="nav-link" href="rinciankeluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                RINCIAN BARANG KELUAR
                            </a>
                            <a class="nav-link" href="logout.php">
                                LOGOUT
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">RINCIAN BARANG MASUK</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                Delete 
                                </button>
                                <a href="exportrincianmasuk.php" class="btn btn-success">Export Data<a/>                
                                <br>
                                <div class="row mt-4">
                                        <div class=" card text-primary"> <h2>Total Data: <?=$count;?></h2></div>
                                </div> 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Penerima</th>
                                            <th>Nomor Seri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn,"select * from rincianmasuk");
                                        while ($data= mysqli_fetch_array($ambilsemuadatastock)){
                                            $tanggal = $data ['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $kodebarang = $data['kodebarang'];
                                            $penerima = $data['penerima'];
                                            $nomorseri = $data['nomorseri'];

                                            

                                        ?>
                                        <tr>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$kodebarang;?></td>
                                            <td><?=$penerima;?></td>
                                            <td><?=$nomorseri;?></td>
                                        </tr>

                                        <!-- delete Modal -->
                                        <div class="modal fade" id="delete">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data?</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                                                    </div>
                
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Yakin Ingin Menghapus ?                                                            
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapusrincianmasuk">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        };

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
