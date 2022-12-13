<?php

require 'function.php';
require 'cek.php';
//get data 
//ambil data total
$get = mysqli_query($conn,"select * from stock");
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
        <title>DASHBOARD</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="Chart.js"></script>
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
                <!-- Begin Page Content -->
                    <div class="container-fluid">
                    
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h1 mb-1 text-gray-800">DASHBOARD</h1>
                        </div>

                        <div class="container px-4">
                            <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='METER AMI 1 Phase'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                            
                                        <div class="row no-gutters align-items-center">        
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold  text-uppercase mb-2">
                                                    AMI 1 Phase</div>
                                                
                                                <div class="h5 mb-0 font-weight-bold text-primary">Stock Tersisa <strong><?=$stock;?> </strong></div>
                
                                                </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='METER AMI 3 Phase'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold  text-uppercase mb-2">
                                                    AMI 3 Phase</div>
                                                <div class="h5 mb-0 font-weight-bold text-success">Stock Tersisa <strong><?=$stock;?> </strong></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Base Plate'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-uppercase mb-2">
                                                    Base Plate
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-info">Stock Tersisa <strong><?=$stock;?> </strong></div>
                                                    </div>
                                                    <div class="col">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Segel Meter'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-uppercase mb-2">
                                                    Segel Meter</div>
                                                <div class="h5 mb-0 font-weight-bold text-warning">Stock Tersisa <strong><?=$stock;?></strong></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!-- KALAU PENGEN NAMBAHIN -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Segel Meter'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-warning text-uppercase mb-2">
                                                    Segel Meter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Stock Tersisa <?=$stock;?></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Segel Meter'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-warning text-uppercase mb-2">
                                                    Segel Meter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Stock Tersisa <?=$stock;?></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Segel Meter'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-warning text-uppercase mb-2">
                                                    Segel Meter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Stock Tersisa <?=$stock;?></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-5">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                    $ambildatastock = mysqli_query($conn,"select * from stock where namabarang='Segel Meter'");

                                    while($fetch=mysqli_fetch_array($ambildatastock)){
                                    $barang = $fetch['namabarang'];
                                    $kodebarang = $fetch['kodebarang'];
                                    $stock = $fetch['stock'];
                                    ?>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 text-xs font-weight-bold text-warning text-uppercase mb-2">
                                                    Segel Meter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Stock Tersisa <?=$stock;?></div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>
                            <br>
                       <body>
                        <center>
                            <h3>Target Pemasangan AMI Meter<br/>--PLN UP3 Surabaya Barat--</h3>
                        </center>

                        <!-- Chart -->
                        <div style="width: 800px;margin: 0px auto;">
                            <canvas id="myChart"></canvas>
                        </div>

                        <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["Meter 1 Phase Terpasang", "Target Meter 1 Phase", "Meter 3 Phase Terpasang", "Target Meter 3 Phase"],
                                    datasets: [{
                                        label: '',
                                        data: [
                                        <?php
                                        $ambildatastock = mysqli_query($conn,"select * from keluar where idbarang=1");

                                        while($fetch=mysqli_fetch_array($ambildatastock)){
                                        $barang = $fetch['idbarang'];
                                        $stock = $fetch['qty'];}
                                        echo $stock;
                                        ?>
                                        ,
                                        10000, 
                                        <?php
                                        $ambildatastock = mysqli_query($conn,"select * from keluar where idbarang=2");

                                        while($fetch=mysqli_fetch_array($ambildatastock)){
                                        $barang = $fetch['idbarang'];
                                        $stock_2 = $fetch['qty'];}
                                        echo $stock_2;
                                        ?>,
                                        5000
                                        ],
                                        backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'
                                        ],
                                        borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                        </body>



                        <div class="col-lg-6 mb-4">
                                </div>
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
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
        <br>
        <input type="text" name="kodebarang" placeholder="Kode Barang" class="form-control" required>
        <br>
        <input type="text" name="deskripsi" placeholder="Deskripsi barang" class="form-control" required>
        <br>
        <input type="number" name="stock" placeholder="Stock" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        </div>
        </form>
    </div>
  </div>
</div>

  
</html>