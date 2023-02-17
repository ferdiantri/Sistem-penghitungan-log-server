<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Admin</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="masuk.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LOGER</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="log.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel</span></a>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="grafik.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grafik</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="home_admin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <?php
                    session_start();
                    $email = $_SESSION["email"];
                    ?>
                    <span>(<?php echo $email; ?>)Keluar</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar">

                    <!-- Sidebar Toggle (Topbar) -->
                    

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="container">

                        <a href="harga_klaim.php" class="btn btn-primary">Harga Klaim</a>
                    <a href="durasi_klaim.php" class="btn btn-primary">Durasi Klaim</a>    
                    <a href="daftar_admin.php" class="btn btn-primary">Tambah Admin</a>
                    <a href="log_aktifitas.php" class="btn btn-primary">Log Aktifitas</a>  

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun </h1>
                            </div>
                            <form class="user" action="proses_daftar.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleName" name="nama"
                                            placeholder="Nama">
                                    </div>
                            
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="kata_sandi" placeholder="Password">
                                    </div>
                                </div>
                                <input type="submit" value="Daftar" class="btn btn-primary btn-user btn-block">
                                </a>
                                
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="admin.php">Sudah punya akun? Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
                    <!-- Content Row -->

                    

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; All Right Reserved</span>
                    </div>
                </div>
            </footer>
        <!-- End of Content Wrapper -->
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->

</body>

</html>