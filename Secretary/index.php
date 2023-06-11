<?php
session_start();
$name = $_SESSION["name"];
if ($_SESSION["status"] != true){

    header("Location: t/login.php");
}

?>

<?php

    function ordinal($number) 
    {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
        else
        return $number. $ends[$number % 10];
    }

?>

<?php  
 include '../connection/database.php';
 $query = "SELECT gender, count(*) as number FROM usertable GROUP BY gender";  
 $result = mysqli_query($conn, $query);  
 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pila Medial Center</title>
    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="icon">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>   
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <!-- Sidebar -->
         <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-balance-scale"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Secretary Panel</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<div class="sidebar-heading">
    Inventory
</div>

<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetree"
                    aria-expanded="true" aria-controls="collapsetree">
                    <i class="fas fa-fw fa-capsules"></i>
                    <span>Medicines</span>
                </a>
                <div id="collapsetree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Active:</h6>
                        <a class="collapse-item" href="medicine.php">Add medicine</a>
                        <a class="collapse-item" href="inventory.php">Inventory</a>
                        <a class="collapse-item" href="manage.php">Manage medicine</a>
                    </div>
                </div>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Medicine</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include '../connection/database.php';
                
                                                $query = "SELECT id FROM medicine ORDER BY id";  
                                                $query_run = mysqli_query($conn, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo $row.'</h4>';
                                            ?>  </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-male fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Stocks</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include '../connection/database.php';
                
                                                $result = mysqli_query($conn, 'SELECT SUM(quantity) AS value_sum FROM medicine'); 
                                                $row = mysqli_fetch_assoc($result); 
                                                $sum = $row['value_sum'];
                                                $summ = number_format((float)$sum, 2, '.', '');
                                                echo number_format($summ).'</h4>';
                                            ?>  </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-message fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">number of Doctors
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php
                                                include '../connection/database.php';
                
                                                $query = "SELECT id FROM doctor ORDER BY id";  
                                                $query_run = mysqli_query($conn, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo $row.'</h4>';
                                            ?>  </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Admins</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                include '../connection/database.php';
                
                                                $query = "SELECT id FROM Admins WHERE level != 'Owner' ORDER BY id";  
                                                $query_run = mysqli_query($conn, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo $row.'</h4>';
                                            ?>  </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-lock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Medicines</h6>
    </div>
    <div class="card-body">
        <?php 
        include '../connection/database.php';
        
        if ($conn) {
            //echo "Connection successfully";  
        } else {  
            echo "Error";  
        }  

        $query="SELECT * from medicine";  
        $connect=mysqli_query($conn,$query);  
        $num=mysqli_num_rows($connect);

        // Define an array of color classes to use for the progress bars
        $colors = array('bg-danger', 'bg-warning', 'bg-info', 'bg-success', 'bg-secondary');

        if ($num>0) {  
            $i = 0;
            while($data=mysqli_fetch_assoc($connect)){
                // Get the remainder of the index divided by the number of colors
                $color_index = $i % count($colors);

                // Use the remainder to select a color from the array
                $color_class = $colors[$color_index];
        ?>

        <div>
            <h4 class="small font-weight-bold"><?= $data['medicine_name'] ?><span
                    class="float-right"><?= $data['quantity'] ?></span></h4>
            <div class="progress mb-4">
                <div class="progress-bar <?= $color_class ?>" role="progressbar" style="width: <?= $data['quantity'] ?>%"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

        <?php
                $i++;
            }
        }
        ?>
    </div>
</div>
    </div>
</div>
<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Frequency analytics</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Once daily
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> Twice daily
                </span>

                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Thrice daily
                </span>

                <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> As needed
                </span>
            </div>
        </div>
    </div>
</div>
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
                    <a class="btn btn-primary" href="t/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <?php
        include '../connection/database.php';
        $sql = "SELECT COUNT(*) as total FROM medicine WHERE frequency = 'Once daily'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $once = $row['total'];

        $sql = "SELECT COUNT(*) as total FROM medicine WHERE frequency = 'Twice daily'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $twice = $row['total'];

        $sql = "SELECT COUNT(*) as total FROM medicine WHERE frequency = 'Thrice daily'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $thrice = $row['total'];

        $sql = "SELECT COUNT(*) as total FROM medicine WHERE frequency = 'As needed'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $needed = $row['total'];

        mysqli_close($conn);

        json_encode(array('once' => $once, 'twice' => $twice, 'thrice' => $thrice, 'needed' => $needed));

    ?>

    <script type="text/javascript">
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Once daily", "Twice daily", "Thrice daily", "As needed"],
        datasets: [{
        data: [<?php echo json_encode($once); ?>, <?php echo json_encode($twice); ?>, <?php echo json_encode($thrice); ?>, <?php echo json_encode($needed); ?>],
        backgroundColor: ['#0275d8', '#f0ad4e', '#5cb85c', '#d9534f'],
        hoverBackgroundColor: ['#0275d8', '#f0ad4e', '#5cb85c', '#d9534f'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });
    </script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>