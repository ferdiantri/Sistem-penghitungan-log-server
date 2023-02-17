<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabel Log</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
include "koneksi.php";
$arraysubjects = array(
    'Internet MVNET',
    'Internet ICON+',
    'Koneksi MVNET',
    'Koneksi ICON+'
);

$arraymonths = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
}else {
    $subject = 'Internet MVNET';
}

if(isset($_GET['bulan'])){
    $bulan = $_GET['bulan'];
}else {
    $bulan = 1;
}

if(isset($_GET['tahun'])){
    $tahun = $_GET['tahun'];
}else {
    $tahun = date('Y');
}
$subjects = array();

        $sql = mysqli_query($koneksi,"SELECT concat(date, ' ', time ) AS datetime, REPLACE(msg, 'APIKA Alert Monitoring : Koneksi ICON+', '') AS subject FROM logs WHERE msg LIKE '%".$subject."%' AND MONTH(date) = '$bulan' AND YEAR(date) = '$tahun'");
        $downtime = '';
        $uptime = '';
        $duration = 0;
        if ($sql->num_rows > 0) {    
        while($row = mysqli_fetch_assoc($sql)) {
        ?>
            <?php $datetime = $row['datetime'];
            $name = str_replace('APIKA Alert Monitoring : ', '', $row['subject']);
            $arraynamestatus = explode(' ', $name);
            $status = array_pop($arraynamestatus);
                if($status == 'DOWN' && $downtime == ''){
                    $downtime = $datetime;
                }
                if($status == 'UP' && $downtime !== '' && $uptime == ''){
                    $uptime = $datetime;
                    $duration += Duration($uptime, $downtime);
                    $uptime = '';
                    $downtime = '';
                }
            }
        } else {
        }  
        date_default_timezone_set('Asia/Jakarta');
        $datetime = date("Y-m-d h:i:s");
        $insert = mysqli_query($koneksi,"INSERT INTO total VALUES ('','$subject','$duration','$bulan','$tahun','$datetime')");

        function Duration($firstdate_string, $seconddate_string){
            $firstdate = new DateTime($firstdate_string);
            $seconddate = new DateTime($seconddate_string);
            $interval = $firstdate->diff($seconddate);
            $day = $interval->format('%m');
            $days_passed = $interval->format('%a');
            $hours_diff = $interval->format('%H');
            $minutes_diff = $interval->format('%I');
            $seconds_diff = $interval->format('%S');
            $total_minutes = (($days_passed*24 + $hours_diff) * 60 + $minutes_diff);
            $total_seconds = $total_minutes*60 + $seconds_diff;
            return $total_seconds;
}
?>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LOGER</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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

            <li class="nav-item">
                <a class="nav-link" href="home_admin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <form method="GET" onchange="submit()">
                                            <select name="subject" class="form-control">
                                            <?php 
                                            for($i = 0; $i< count($arraysubjects); $i++){
                                            ?>
                                            <option value="<?php echo $arraysubjects[$i];?>" 
                                            <?php if ($arraysubjects[$i] == $subject) echo " selected " ?>
                                            > <?php echo $arraysubjects[$i]; ?></option> 
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    
                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <form method="GET" onchange="submit()">
                                            <select name="bulan" class="form-control">
                                            <?php
                                            for($i = 1; $i<=12; $i++){
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php if($bulan==$i) echo "selected"?> ><?php echo $arraymonths[$i-1]?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <form method="GET" onchange="submit()">
                                            <select name="tahun" class="form-control">
                                            <option value="2020" <?php if($tahun == 2020) echo "selected"?>>2020</option>
                                            <option value="2021" <?php if($tahun == 2021) echo "selected"?>>2021</option>
                                            <option value="2022" <?php if($tahun == 2022) echo "selected"?>>2022</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Counter Down Time</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $duration; ?> Detik</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Pending Requests Card Example -->

                    <div class="row">

                        <div class="col-xl-9 col-md-10 mb-10">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <table class="table-bordered" width="100%">
                                            <tr>
                                                <th class="col-sm-4">Date Time</th>
                                                <th class="col-sm-4">Info Name</th>
                                                <th class="col-sm-4">Status</th>
                                            </tr>
                                            <?php 
                                            $sql_res = mysqli_query($koneksi,"SELECT concat(date, ' ', time ) AS datetime, REPLACE(msg, 'APIKA Alert Monitoring : Internet ICON+', '') AS subject FROM logs WHERE msg LIKE '%".$subject."%' AND MONTH(date) = '$bulan' AND YEAR(date) = '$tahun'"); 
                                            while($res=mysqli_fetch_assoc($sql_res)){
                                            $name = str_replace('APIKA Alert Monitoring : ', '', $res['subject']);
                                            $arraynamestatus = explode(' ', $name);
                                            $status = array_pop($arraynamestatus);
                                            ?>
                                            <tr>
                                                <td class="col-sm-4"><?php echo $res['datetime']; ?></td>
                                                <td class="col-sm-4"><?php echo $subject; ?></td>
                                                <td class="col-sm-4"><?php echo $status; ?></td>
                                            </tr>
                                            <?php };?>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="row-xl-3 row-md-6 mb-4">

                                <div class="card shadow h-10 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Harga Klaim Perdetik</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $q_harga = mysqli_query($koneksi,"SELECT * FROM harga WHERE years = '$tahun'");
                                                $harga = mysqli_fetch_assoc($q_harga);
                                                echo 'Rp'.$harga['harga'];
                                                ?>/Detik</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-xl-3 row-md-6 mb-4">
                                <div class="card shadow h-10 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Total Klaim</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $cek_min = mysqli_query($koneksi,"SELECT * FROM min_dur WHERE years='$tahun'");
                                                $min = mysqli_fetch_assoc($cek_min);
                                                if($min['min_durasi']<=$duration){
                                                    $total_klaim = $harga['harga']*$duration;
                                                }
                                                else{
                                                    $total_klaim = '0';
                                                }
                                                echo 'Rp'.$total_klaim;
                                                ?>,-</div>
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