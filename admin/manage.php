<?php
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;
 
session_start();
$name = $_SESSION["name"];

if ($_SESSION["status"] != true){

    header("Location: t/login.php");
}

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>

.pending {
font-size: 13px;
font-weight: bold;
padding-left: 10px;
padding-right: 10px;
border-radius: 10px;
border: none;
text-align: center;
background: #ff9800;
color: white;
}

.delete {
color: #E55451;
font-size: 18.5px;
margin-left: 2%
}
.view{
color: #2B547E;
font-size: 23px;
}
.approve {
color: #66CDAA;
font-size: 18.5px;
margin-left: 2%
}

.delete:hover{
color: #BCC6CC;
}
.view:hover{
color: #BCC6CC;
}
.approve:hover{
color: #BCC6CC;
}

.form-group {
  position: relative;
}

.form-group input {
  padding-top: 10px;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-radius: 0%;
  font-size: 12px;
}

.form-group button {
  padding-top: 10px;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-radius: 0%;
  font-size: 12px;
}

.form-group textarea {
  padding-top: 10px;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-radius: 0%;
  font-size: 12px;
}

textarea.form-control:focus {
  box-shadow: none;
  border-color: transparent;
  border-bottom: 2px solid #4E9CAF;
}

.form-group select {
  padding-top: 10px;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-radius: 0%;
  font-size: 12px;
}

select.form-control:focus {
  box-shadow: none;
  border-color: transparent;
  border-bottom: 2px solid #4E9CAF;
}

input.form-control:focus {
  box-shadow: none;
  border-color: transparent;
  border-bottom: 2px solid #4E9CAF;
}

button.form-control:focus {
  box-shadow: none;
  border-color: transparent;
  border-bottom: 2px solid #4E9CAF;
}


label:focus {
  color: #808080;
}
select:focus {
  color: #808080;
}

.form-group label {
  position: absolute;
  top: 0;
  left: 0;
  font-size: 12px;
  color: #999;
  transition: all 0.2s ease;
  pointer-events: none;
  padding: 10px;
}


.form-group input:focus + label,
.form-group input:valid + label {
  top: -20px;
  font-size: 12px;
  color: #808080;
}

.form-group textarea:focus + label,
.form-group textarea:valid + label {
  top: -20px;
  font-size: 12px;
  color: #808080;
}

.form-group select:focus + label,
.form-group select:valid + label{
  top: -20px;
  font-size: 12px;
  color: #808080;
}

input[type=date]:required:invalid::-webkit-datetime-edit {
    color: transparent;
}
input[type=date]:focus::-webkit-datetime-edit {
    color: #808080 !important;
}

input[type="text"] {
    color: #5f9ea0;
  }

textarea[type="text"] {
    color: #5f9ea0;
  }  



    </style>
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
    <div class="sidebar-brand-text mx-3">Admin Panel</div>
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
            Consultation
</div>

<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-male"></i>
                    <span>Appointments</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Active:</h6>
                        <a class="collapse-item" href="appointment.php">Pending</a>
                        <a class="collapse-item" href="approved.php">Approved</a>
                    </div>
                </div>
            </li>

<li class="nav-item">
    <a class="nav-link" href="history.php">
        <i class="fas fa-fw fa-book"></i>
        <span>History</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="archive.php">
        <i class="fas fa-fw fa-file"></i>
        <span>Archive</span></a>
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

<div class="sidebar-heading">
    Contacts
</div>

<li class="nav-item">
    <a class="nav-link" href="contact.php">
        <i class="fas fa-fw fa-message"></i>
        <span>Messeges</span></a>
</li>



<div class="sidebar-heading">
        Security
</div>  
<li class="nav-item">
    <a class="nav-link" href="doctor.php">
        <i class="fas fa-fw fa-user-md"></i>
        <span>Doctors</span></a>
</li>   

<li class="nav-item">
    <a class="nav-link" href="admins.php">
        <i class="fas fa-fw fa-lock"></i>
        <span>Accounts</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="logs.php">
        <i class="fas fa-fw fa-book"></i>
        <span>Log book</span></a>
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


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Perscription's Information</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">     
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                        <th style="white-space:nowrap">ID no.</th>
                                            <th style="white-space:nowrap">Patient's name</th>
                                            <th style="white-space:nowrap">Ticket no.</th>
                                            <th style="white-space:nowrap">Doctor</th>
                                            <th style="white-space:nowrap">Clinic Located</th>
                                            <th style="white-space:nowrap">Stocks</th>
                                            <th style="white-space:nowrap">Medicine</th>
                                            <th style="white-space:nowrap">number of capsule</th>
                                            <th style="white-space:nowrap">Time to take</th>
                                            <th style="white-space:nowrap">Start taking</th>
                                            <th style="white-space:nowrap">End taking</th>                                            
                                            <th style="white-space:nowrap">Note</th>
                                            <th style="white-space:nowrap">Medication</th>
                                            <th style="white-space:nowrap">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                    $bill = 1;
                                    include '../connection/database.php';
                                    
                                    if ($conn) {
                                        //echo "Connection successfully";  
                                    } else {  
                                        echo "Error";  
                                    }  

                                    $query="SELECT * from percription";  
                                    $connect=mysqli_query($conn,$query);  
                                    $num=mysqli_num_rows($connect);

                                    if ($num>0) {  
                                        while($data=mysqli_fetch_assoc($connect)){
                                            $id = $data['id']; 
                                            $medicine = $data['medicine'];
                                            $status = $data['status'];
                                            $name = $data['name'];
                                            $time_take = $data['time_take'];
                                            $doctor = $data['doctor'];

                                            $hours = floor($time_take);
                                            $minutes = ($time_take - $hours) * 60;

                                            $time_format = date('H:i', strtotime("$hours:$minutes"));
                                            ?>



                                            <tr style="font-size: 14px;color: #2B547E;font-weight:bold;padding-left: 15%;">  
                                                <td><?= $bill++; ?></td>
                                                <td style="white-space:nowrap"><?= $data['name']; ?></td>
                                                <td style="white-space:nowrap"><?= $data['ticket']; ?></td>
                                                <td style="white-space:nowrap"><?= $data['doctor']; ?></td>
                                                <?php 
                                                $queryss = "SELECT doctor_location FROM doctor WHERE doctor_name = '$doctor'";
                                                $connectss = mysqli_query($conn, $queryss);
                                                $numss = mysqli_num_rows($connectss);

                                                if ($numss > 0) {
                                                    while ($datass = mysqli_fetch_assoc($connectss)) {
                                                              
                                                     ?>
                                                <td style="white-space:nowrap"><?= $datass['doctor_location']; ?></td>
                                                <?php
                                        }}
                                                ?>


                                                <?php 
                                                $querys = "SELECT quantity FROM medicine WHERE medicine_name = '$medicine'";
                                                $connects = mysqli_query($conn, $querys);
                                                $nums = mysqli_num_rows($connects);

                                                if ($nums > 0) {
                                                    while ($datas = mysqli_fetch_assoc($connects)) {
                                                        $quan = $datas['quantity'];      }
                                                    } ?>


                                                <td style="white-space:nowrap"><?= $quan; ?></td>
                                                <td style="white-space:nowrap"><?= $data['medicine']; ?></td>
                                                <td style="white-space:nowrap;">&nbsp;&nbsp;&nbsp;<?= $data['intake']; ?> Pcs
                                                    <?php
                                                    if ($quan >= $data['intake']) {
                                                        ?>
                                                        <button style="font-size: 10px;" type="button" class="btn btn-danger ml-2 approve-button<?= $id; ?>" data-id="<?= $id; ?>" data-intake="<?= $data['intake']; ?>" <?= ($status == 'Distributed') ? 'disabled' : ''; ?>><?= ($status == 'Distributed') ? 'Distributed' : 'Approve'; ?></button>                                               
                                                        <?php
                                                    } else if($quan < $data['intake']) {
                                                        ?>
                                                        <button style="font-size: 10px;" type="button" class="btn btn-danger ml-2 approve-button" disabled>Out of stock</button>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        <button style="font-size: 10px;" type="button" class="btn btn-danger ml-2 approve-button" disabled>Distributed</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>

                                                            <td style="white-space:nowrap">Every <?= $data['time_take']; ?> hours</td>
                                                            <td style="white-space:nowrap"><?= $data['from_date']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['to_date']; ?></td>
                                                            <td style="text-align: center;"><button style="font-size: 10px;" type="button" class="btn btn-secondary view-button" data-toggle="modal" data-target="#ckdModal<?= $data['id']; ?>">View</button></td>
                                                            <td style="white-space:nowrap">
                                                            <button style="font-size: 10px;" type="button" class="btn btn-success view-button" data-toggle="modal" data-target="#medical<?= $data['id']; ?>">View</button>
                                                            <button style="font-size: 10px;" type="button" class="btn btn-primary add-button ml-2" data-toggle="modal" data-target="#Referral<?= $data['id']; ?>">Referral</button>
                                                            </td>
                                                            <td >
                                                            <a href="delete/manage_delete.php?ticket=<?= $data['ticket']; ?>" class="delete text-align-center"><i class='fa-solid fa-rectangle-xmark xmark'></i></a>  </td>
                                                            </tr> 

                                                            <script>
                                                            $(document).ready(function() {
                                                            $('.approve-button<?= $id; ?>').click(function() {
                                                                var btn = $(this);
                                                                var medicineId = btn.data('id');
                                                                var intake = btn.data('intake');

                                                                $.ajax({
                                                                url: 'update_medicine_quantity.php',
                                                                type: 'post',
                                                                data: {
                                                                    id: medicineId,
                                                                    intake: intake
                                                                },
                                                                success: function(response) {
                                                                    btn.prop('disabled', true);
                                                                    btn.text('Distributed');
                                                                    // Find the td element that displays the quantity
                                                                    var td = btn.closest('tr').find('td:nth-child(6)');
                                                                    // Update the text of the td element to the updated quantity
                                                                    td.text(response);

                                                                    // Update the status in the database
                                                                    $.ajax({
                                                                    url: 'update_medicine_status.php',
                                                                    type: 'post',
                                                                    data: {
                                                                        id: medicineId,
                                                                        status: 'Distributed'
                                                                    }
                                                                    });
                                                                }
                                                                });
                                                            });
                                                            });
                                                            </script>

                                                <?php 
                                                $queryss = "SELECT * FROM referral WHERE name = '$name'";
                                                $connectss = mysqli_query($conn, $queryss);
                                                $numss = mysqli_num_rows($connectss);

                                                if ($numss > 0) {
                                                    while ($datass = mysqli_fetch_assoc($connectss)) {   
                                                        ?>  

                                                        <div class="modal fade" id="Referral<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Referral" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="Referral">Referral's information <i class="fas fa-fw fa-exchange"></i></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 35px;">
                                                            <form id="addreferralForm<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                                                            <h5 class="modal-title mb-4" id="ckdModalLabel">Referral details</h5>
                                                            <div class="row">
                                                                
                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_doctorname<?php echo $data['id']; ?>" name="ref_doctorname" required value="<?= $datass['ref_doctorname']; ?>">
                                                                <label for="ref_doctorname">&nbsp;&nbsp;&nbsp;Doctor name</label>
                                                                <div class="invalid-feedback">Please enter doctor name</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_clinic<?php echo $data['id']; ?>" name="ref_clinic" required value="<?= $datass['ref_clinic']; ?>">
                                                                <label for="ref_clinic">&nbsp;&nbsp;&nbsp;Clinic located</label>
                                                                <div class="invalid-feedback">Please enter clinic located</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_phone<?php echo $data['id']; ?>" name="ref_phone" required value="<?= $datass['ref_phone']; ?>">
                                                                <label for="ref_phone">&nbsp;&nbsp;&nbsp;Phone number</label>
                                                                <div class="invalid-feedback">Please enter phone number</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_email<?php echo $data['id']; ?>" name="ref_email" required value="<?= $datass['ref_email']; ?>">
                                                                <label for="ref_email">&nbsp;&nbsp;&nbsp;Email address</label>
                                                                <div class="invalid-feedback">Please enter email address</div>
                                                            </div>

                                                            <div class="col-md-9 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="ref_reason" name="ref_reason" style="height: 100px; width: 425px;" required value="<?= $datass['ref_reason']; ?>"></textarea>
                                                                <label for="ref_reason">&nbsp;&nbsp;&nbsp;Reason for referring</label>
                                                                <div class="invalid-feedback">Please enter your reason for referring</div>
                                                            </div>
                                                            </div>
                                                            <!-- End referral details -->                                                   
                                                            
                                                            </form>
                                                            </div>


                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div></div>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $("#ref_reason").val("<?= $datass['ref_reason']; ?>");
                                                            });
                                                            </script>
<?php
                                                    }
                                                } ?>
                                                            
                                                            
                                                        <div class="modal fade" id="ckdModal<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ckdModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ckdModalLabel"><?= $data['name']; ?> <i class="fas fa-fw fa-message"></i></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 35px;">
                                                            <?= $data['recomment2']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <br>
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>
                                                        </div></div>

                                                        <div class="modal fade" id="medical<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ckdModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ckdModalLabel">Medical Informations <i class="fas fa-fw fa-message"></i></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 35px;">
                                                            <form id="addPerscriptionForm" method="post" enctype="multipart/form-data">
                                                            <h5 class="modal-title mb-4" id="ckdModalLabel">Medical details</h5>
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="IDmo" value="<?= $data['id']; ?>">
                                                            <div class="row">

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="height" name="bloodtype" required value="<?= $data['bloodtype']; ?>">
                                                                <label for="height">&nbsp;&nbsp;&nbsp;Height (Feet)</label>
                                                                <div class="invalid-feedback">Please enter your height</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="height" name="height" required value="<?= $data['height']; ?>">
                                                                <label for="height">&nbsp;&nbsp;&nbsp;Height (Feet)</label>
                                                                <div class="invalid-feedback">Please enter your height</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="weight" name="weight" required value="<?= $data['weight']; ?>">
                                                                <label for="weight">&nbsp;&nbsp;&nbsp;Weight (Kg)</label>
                                                                <div class="invalid-feedback">Please enter your weight</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="bmi" name="bmi" required value="<?= $data['bmi']; ?>">
                                                                <label for="bmi">&nbsp;&nbsp;&nbsp;BMI(Body Mass Index)</label>
                                                                <div class="invalid-feedback">Please enter your bmi</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="bloodpressure" name="bloodpressure" required value="<?= $data['bloodpressure']; ?>">
                                                                <label for="bloodpressure">&nbsp;&nbsp;&nbsp;Blood Pressure</label>
                                                                <div class="invalid-feedback">Please enter your blood pressure</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="pulse" name="pulse" required value="<?= $data['pulse']; ?>">
                                                                <label for="pulse">&nbsp;&nbsp;&nbsp;Pulse rate (per minute)</label>
                                                                <div class="invalid-feedback">Please enter your pulse rate</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="oxygensaturation" name="oxygensaturation" required value="<?= $data['oxygensaturation']; ?>">
                                                                <label for="oxygensaturation">&nbsp;&nbsp;&nbsp;Oxygen Saturation</label>
                                                                <div class="invalid-feedback">Please enter your oxygen saturation</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="temp" name="temp" required value="<?= $data['temp']; ?>">
                                                                <label for="temp">&nbsp;&nbsp;&nbsp;Temperature</label>
                                                                <div class="invalid-feedback">Please enter your temperature</div>
                                                            </div>                                                                                                                                
                                                            

                                                            <div class="col-md-9 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="info" name="info" style="height: 100px; width: 435px;" required></textarea>
                                                                <label for="info">&nbsp;&nbsp;&nbsp;Diagnosis</label>
                                                                <div class="invalid-feedback">Please enter your diagnosis</div>
                                                            </div>

                                                            <div class="col-md-9 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="recomment1" name="recomment1" style="height: 100px; width: 435px;" required></textarea>
                                                                <label for="recomment1">&nbsp;&nbsp;&nbsp;Recommendation</label>
                                                                <div class="invalid-feedback">Please enter your recommendation</div>
                                                            </div>

                                                            <script>
                                                            $(document).ready(function() {
                                                                $("#info").val("<?= $data['info']; ?>");
                                                                $("#recomment1").val("<?= $data['recomment1']; ?>");
                                                            });
                                                            </script>
                                                            </div>
                                                            <!-- End Medical details -->
                                                            </div>
                                                            <div class="modal-footer">
                                                            <br>
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>
                                                        </div></div>

                                                         <?php
                                                            
                                                    }
                                                     
                                                    if (date('H:i') == $time_format) {
                                                        $account_sid = "AC42f5c7b26ab5944af7591f5c5080fa10";
                                                        $auth_token = "ee786d1d6a40f5e81f0df289f3aaf23f";
                                                        $twilio_number = "+13205372280";
                                                        $to = $phone;
                                                        $message = "Dear $name,\n\n\n\n\n\n\n\n
                                                         Thank you for trusitng us here at Pila Medical Center.\n\n\n\n
                                                         This message will remind you to take your medicine now.\n\n
                                                         \n\nThank you again for choosing Pila Medical Center for your healthcare needs. We look forward to serving you soon.
                                                         \n\n\n\nBest regards,
                                                         \nThe Pila Medical Center Team";
                                                    
                                                        $client = new Client($account_sid, $auth_token);
                                                    
                                                        $message = $client->messages->create(
                                                            $to,
                                                            array(
                                                                "from" => $twilio_number,
                                                                "body" => $message
                                                            )
                                                        );
                                                    }
                                                }  
                                        ?>  
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                    <script>
                        $('.delete').on('click', function(e){
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                            title: 'Are you sure?',
                            text: "you want to delete this appointment?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                            
                            }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                                
                                
                            }
                            })
                        })



                    </script>

                        <script>
                        $('.approve').on('click', function(e){
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to undo this?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, do it!'
                            
                            }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                                
                                
                            }
                            })
                        })



                    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Admin Panel 2022-2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>