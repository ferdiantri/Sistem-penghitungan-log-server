<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grafik</title>

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

if(isset($_GET['tahun'])){
    $tahun = $_GET['tahun'];
}else {
    $tahun = date('Y');
}
$subjects = array();
$query_jan = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 1 AND tahun = '$tahun'");
$jan = mysqli_fetch_assoc($query_jan);
$januari = $jan['duration'];

$query_feb = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 2 AND tahun = '$tahun'");
$feb = mysqli_fetch_assoc($query_feb);
$februari = $feb['duration'];

$query_mar = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 3 AND tahun = '$tahun'");
$mar = mysqli_fetch_assoc($query_mar);
$maret = $mar['duration'];

$query_apr = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 4 AND tahun = '$tahun'");
$apr = mysqli_fetch_array($query_apr);
$april = $apr['duration'];

$query_mei = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 5 AND tahun = '$tahun'");
$me = mysqli_fetch_array($query_mei);
$mei = $me['duration'];

$query_jun = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 6 AND tahun = '$tahun'");
$jun = mysqli_fetch_assoc($query_jun);
$juni = $jun['duration'];

$query_jul = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 7 AND tahun = '$tahun'");
$jul = mysqli_fetch_assoc($query_jul);
$juli = $jul['duration'];

$query_agu = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 8 AND tahun = '$tahun'");
$agu = mysqli_fetch_assoc($query_agu);
$agustus = $agu['duration'];

$query_sep = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 9 AND tahun = '$tahun'");
$sep = mysqli_fetch_assoc($query_sep);
$september = $sep['duration'];

$query_okt = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 10 AND tahun = '$tahun'");
$okt = mysqli_fetch_assoc($query_okt);
$oktober = $okt['duration'];

$query_nov = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 11 AND tahun = '$tahun'");
$nov = mysqli_fetch_assoc($query_nov);
$november = $nov['duration'];

$query_des = mysqli_query($koneksi,"SELECT MAX(duration) AS duration FROM total WHERE subject LIKE '%".$subject."%' AND bulan = 12 AND tahun = '$tahun'");
$des = mysqli_fetch_assoc($query_des);
$desember = $des['duration'];
?>


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
            <li class="nav-item active">
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
                    

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Grafik</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <form method="GET">
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
                                            <form method="GET">
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
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>              
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml = $januari+$februari+$maret+$april+$mei+$juni+$juli+$agustus+$september+$november+$desember; ?> Detik</div>
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
                                        <canvas id="myChart" class="chart" width="50%" height="50%"></canvas>
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
                                                if($min['min_durasi']<=$jml){
                                                    $total_klaim = $harga['harga']*$jml;
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
    

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
                datasets: [{
                    label: '',
                    data: [
                    <?php echo $januari; ?>,
                    <?php echo $februari; ?>,
                    <?php echo $maret; ?>,
                    <?php echo $april; ?>,
                    <?php echo $mei; ?>,
                    <?php echo $juni; ?>,
                    <?php echo $juli; ?>,
                    <?php echo $agustus; ?>,
                    <?php echo $september; ?>,
                    <?php echo $oktober; ?>,
                    <?php echo $november; ?>,
                    <?php echo $desember; ?>
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
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
    <!-- Page level custom scripts -->

</body>

</html>