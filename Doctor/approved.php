<?php
session_start();
$doctor = $_SESSION["doctor"];
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
  function setDefaultValue(input, defaultValue) {
    if (input.value.length <= defaultValue.length) {
      input.value = defaultValue;
    }
  }
</script>

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
    <div class="sidebar-brand-text mx-3">Doctor Panel</div>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $doctor ?></span>
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
                    <h1 class="h3 mb-2 text-gray-800">Appointment's Information</h1>

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
                                            <th style="white-space:nowrap">Ticket no.</th>
                                            <th style="white-space:nowrap">Full name</th>
                                            <th>Gender</th>
                                            <th style="white-space:nowrap">Phone number</th>
                                            <th>Doctor</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            <th style="white-space:nowrap">&nbsp;&nbsp;&nbsp;&nbsp;Prescription&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            
                                        </tr>
                                    </thead>
                                <?php 
                                $bill = 1;
                                include '../connection/database.php';
                                //hostname, username, password, database name  
                                if ($conn) {

                                    //echo "Connection successfully";  
                                }else{  
                                    echo "Error";  
                                }  
                                $query="SELECT * from active WHERE doctor = '$doctor'";  
                                $connect=mysqli_query($conn,$query);  
                                $num=mysqli_num_rows($connect);
                                
                                                    
                                                    
                                                if ($num>0) {  
                                                    while($data=mysqli_fetch_assoc($connect)){
                                                        $id = $data['id'];
                                                        $name = $data['name'];
                                                         ?>                                                        
                                                        
                                                        

                                                            <tr style="font-size: 14px;color: #2B547E;font-weight:bold;padding-left: 15%;">  
                                                            <td><?= $bill++; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['ticket']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['name']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['gender']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['phone']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['doctor']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['date']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['time']; ?></td>
                                                            <td style="text-align: center;">
                                                            <button style="font-size: 10px;" type="button" class="btn btn-secondary view-button" data-toggle="modal" data-target="#ckdModal<?= $data['id']; ?>" >View</button></td>
                                                            <td style="white-space:nowrap">

                                                            <button style="font-size: 10px;" type="button" class="btn btn-success view-button" data-toggle="modal" data-target="#Perscription<?= $data['id']; ?>">Open</button>
                                                            <button style="font-size: 10px;" type="button" class="btn btn-primary add-button ml-2" data-toggle="modal" data-target="#Referral<?= $data['id']; ?>">Referral</button>
                                                            </td>
                                                            </tr> 
                                                            
                                                            
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
                                                            <?= $data['message']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <br>
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>
                                                        </div></div>

                                                        <div class="modal fade" id="Referral<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Referral" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="Referral">Add Referral <i class="fas fa-fw fa-exchange"></i></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 35px;">
                                                            <form id="addreferralForm<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                                                            <h5 class="modal-title mb-4" id="ckdModalLabel">Referral details</h5>
                                                            <input style="margin-top: -10%;" type="text" class="form-control invisible" name="name" value="<?= $data['name']; ?>">
                                                            <input style="margin-top: -10%;" type="text" class="form-control invisible" name="phone" value="<?= $data['phone']; ?>">
                                                            <input style="margin-top: -10%;" type="text" class="form-control invisible" name="province" value="<?= $data['province']; ?>">
                                                            <input style="margin-top: -10%;" type="text" class="form-control invisible" name="city" value="<?= $data['city']; ?>">
                                                            <input style="margin-top: -10%;" type="text" class="form-control invisible" name="IDmo" value="<?= $data['id']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="barangay" value="<?= $data['barangay']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="doctor" value="<?= $data['doctor']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="ticket" value="<?= $data['ticket']; ?>">
                                                            <div class="row">
                                                                
                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_doctorname<?php echo $data['id']; ?>" name="ref_doctorname" required oninput="setDefaultValue(this, 'Dr. ')">
                                                                <label for="ref_doctorname">&nbsp;&nbsp;&nbsp;Doctor name</label>
                                                                <div class="invalid-feedback">Please enter doctor name</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_clinic<?php echo $data['id']; ?>" name="ref_clinic" required>
                                                                <label for="ref_clinic">&nbsp;&nbsp;&nbsp;Clinic located</label>
                                                                <div class="invalid-feedback">Please enter clinic located</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="text" class="form-control" id="ref_phone<?php echo $data['id']; ?>" name="ref_phone" minlength="11" maxlength="13" required oninput="setDefaultValue(this, '+63')">
                                                                <label for="ref_phone">&nbsp;&nbsp;&nbsp;Phone number</label>
                                                                <div class="invalid-feedback">Please enter phone number</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <input type="email" class="form-control" id="ref_email<?php echo $data['id']; ?>" name="ref_email" required>
                                                                <label for="ref_email">&nbsp;&nbsp;&nbsp;Email address</label>
                                                                <div class="invalid-feedback">Please enter email address</div>
                                                            </div>

                                                            <div class="col-md-9 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="ref_reason<?php echo $data['id']; ?>" name="ref_reason" style="height: 100px; width: 425px;" required></textarea>
                                                                <label for="ref_reason">&nbsp;&nbsp;&nbsp;Reason for referring</label>
                                                                <div class="invalid-feedback">Please enter your reason for referring</div>
                                                            </div>
                                                            </div>
                                                            <!-- End referral details -->                                                   
                                                            
                                                            </form>
                                                            </div>


                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" id="saverefbtn<?php echo $data['id']; ?>">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div></div>
                                                        <!--End Modal2 -->  

                                                        <script>
                                                        $(document).ready(function() {
                                                        $("#saverefbtn<?php echo $data['id']; ?>").click(function(e) {
                                                            e.preventDefault();
                                                            var ref_doctorname = $("#ref_doctorname<?php echo $data['id']; ?>").val().trim();
                                                            var ref_clinic = $("#ref_clinic<?php echo $data['id']; ?>").val().trim();
                                                            var ref_phone = $("#ref_phone<?php echo $data['id']; ?>").val().trim();
                                                            var ref_email = $("#ref_email<?php echo $data['id']; ?>").val().trim();
                                                            var ref_reason = $("#ref_reason<?php echo $data['id']; ?>").val().trim();
                                                            var isValid = true;


                                                            if (ref_doctorname === "") {
                                                            $("#ref_doctorname<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#ref_doctorname<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (ref_clinic === "") {
                                                            $("#ref_clinic<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#ref_clinic<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (ref_phone === "") {
                                                            $("#ref_phone<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#ref_phone<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (ref_email === "") {
                                                            $("#ref_email<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#ref_email<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (ref_reason === "") {
                                                            $("#ref_reason<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#ref_reason<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }
                                                        

                                                            if (isValid) {
                                                                if (isValid) {
                                                                    var formData = $("#addreferralForm<?php echo $data['id']; ?>").serialize();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "referral_process.php",
                                                                        data: formData,
                                                                        success: function(response) {
                                                                            if(response == "success"){
                                                                            Swal.fire(
                                                                            'Good job!',
                                                                            'You Successfully added the referral!',
                                                                            'success'
                                                                            ).then(function() {
                                                                                window.location.reload();
                                                                            });
                                                                        }else if(response == "fail"){
                                                                            Swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Oops...',
                                                                                text: 'You already have an referral',
                                                                                })
                                                                        }else {
                                                                            Swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Oops...',
                                                                                text: 'Something wrong with the code',
                                                                                })
                                                                        }
                                                                        console.log(response);
                                                                        },
                                                                        error: function(error) {
                                                                        alert("Error");
                                                                        console.error(error);
                                                                        }
                                                                    });
                                                                    }
                                                            }
                                                        });
                                                        });
                                                        </script>


                                                        <div class="modal fade" id="Perscription<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ckdModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ckdModalLabel">Add Prescription <i class="fas fa-fw fa-prescription"></i></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 35px;">

                                                            <!-- Medical details -->
                                                            
                                                            <form id="addPerscriptionForm<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                                                            <h5 class="modal-title mb-4" id="ckdModalLabel">Medical details</h5>
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="IDmo" value="<?= $data['id']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="phone" value="<?= $data['phone']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="doctor" value="<?= $data['doctor']; ?>">
                                                            <input style="margin-top: -5%;" type="text" class="form-control invisible" name="ticket" value="<?= $data['ticket']; ?>">
                                                            <div class="row">

                                                            <div class="col-md-3 form-group mb-4">
                                                                <select type="text" class="form-control" id="bloodtype<?php echo $data['id']; ?>" name="bloodtype" required>
                                                                <option value="" disabled selected hidden></option>
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="O-">O-</option>
                                                                </select>
                                                                <label for="bloodtype">&nbsp;&nbsp;&nbsp;Blood Type</label>
                                                                <div class="invalid-feedback">Please choose blood type</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="height<?php echo $data['id']; ?>" name="height" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <label for="height">&nbsp;&nbsp;&nbsp;Height (Feet)</label>
                                                                <div class="invalid-feedback">Please enter your height</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="weight<?php echo $data['id']; ?>" name="weight" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <label for="weight">&nbsp;&nbsp;&nbsp;Weight (Kg)</label>
                                                                <div class="invalid-feedback">Please enter your weight</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="bmi<?php echo $data['id']; ?>" name="bmi" required>
                                                                <label for="bmi">&nbsp;&nbsp;&nbsp;BMI(Body Mass Index)</label>
                                                                <div class="invalid-feedback">Please enter your bmi</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="bloodpressure<?php echo $data['id']; ?>" name="bloodpressure" required>
                                                                <label for="bloodpressure">&nbsp;&nbsp;&nbsp;Blood Pressure</label>
                                                                <div class="invalid-feedback">Please enter your blood pressure</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="pulse<?php echo $data['id']; ?>" name="pulse" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <label for="pulse">&nbsp;&nbsp;&nbsp;Pulse rate (per minute)</label>
                                                                <div class="invalid-feedback">Please enter your pulse rate</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="oxygensaturation<?php echo $data['id']; ?>" name="oxygensaturation" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <label for="oxygensaturation">&nbsp;&nbsp;&nbsp;Oxygen Saturation</label>
                                                                <div class="invalid-feedback">Please enter your oxygen saturation</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="temp<?php echo $data['id']; ?>" name="temp" required>
                                                                <label for="temp">&nbsp;&nbsp;&nbsp;Temperature</label>
                                                                <div class="invalid-feedback">Please enter your temperature</div>
                                                            </div>                                                                                                                                
                                                            

                                                            <div class="col-md-6 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="info<?php echo $data['id']; ?>" name="info" style="height: 100px;" required></textarea>
                                                                <label for="info">&nbsp;&nbsp;&nbsp;Diagnosis</label>
                                                                <div class="invalid-feedback">Please enter your diagnosis</div>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <textarea type="text" class="form-control" id="recomment1<?php echo $data['id']; ?>" name="recomment1" style="height: 100px;" required></textarea>
                                                                <label for="recomment1">&nbsp;&nbsp;&nbsp;Recommendation</label>
                                                                <div class="invalid-feedback">Please enter your recommendation</div>
                                                            </div>
                                                            </div>
                                                            <!-- End Medical details -->

                                                            <!-- E-prescription -->
                                                            <h5 class="modal-title mb-5" id="ckdModalLabel">E-prescription</h5>
                                                            <div class="row">

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="name<?php echo $data['id']; ?>" name="name" value="<?= $data['name']; ?>" required>
                                                                <label for="name">&nbsp;&nbsp;&nbsp;Patient name</label>
                                                                <div class="invalid-feedback">Please enter your name</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="age<?php echo $data['id']; ?>" name="age" value="<?= $data['age']; ?>" required>
                                                                <label for="age">&nbsp;&nbsp;&nbsp;Age</label>
                                                                <div class="invalid-feedback">Please enter your age</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="datenow<?php echo $data['id']; ?>" name="datenow" value="<?= $data['date']; ?>" required>
                                                                <label for="datenow">&nbsp;&nbsp;&nbsp;Date</label>
                                                                <div class="invalid-feedback">Please enter date</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                            <select type="text" class="form-control" id="medicine<?php echo $data['id']; ?>" name="medicine" required>
                                                                <option value="" disabled selected hidden></option>
                                                                <?php
                                                                    include '../connection/database.php';
                                                                    $sql = "SELECT medicine_name FROM medicine";
                                                                    $result = mysqli_query($conn, $sql);

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        echo "<option value='" . $row['medicine_name'] . "'>" . $row['medicine_name'] . "</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <label for="medicine">&nbsp;&nbsp;&nbsp;Select Medicine</label>
                                                            <div class="invalid-feedback">Please choose medicine</div>
                                                        </div>

                                                        <div class="col-md-3 form-group mb-4">
                                                            <input type="text" class="form-control" id="intake<?php echo $data['id']; ?>" name="intake" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <label for="intake">&nbsp;&nbsp;&nbsp;Number of Capsule</label>
                                                            <div class="invalid-feedback">Please enter number of capsule</div>
                                                        </div>

                                                        <div class="col-md-3 form-group mb-4">
                                                            <input type="text" class="form-control" id="dosage<?php echo $data['id']; ?>" name="dosage" required>
                                                            <label for="dosage">&nbsp;&nbsp;&nbsp;Dosage</label>
                                                            <div class="invalid-feedback">Please enter dosage</div>
                                                        </div>                                                    

                                                        <div class="col-md-3 form-group mb-4">
                                                            <input type="text" class="form-control" id="frequency<?php echo $data['id']; ?>" name="frequency" required>
                                                            <label for="frequency">&nbsp;&nbsp;&nbsp;Frequency</label>
                                                            <div class="invalid-feedback">Please enter frequency</div>
                                                        </div>

                                                        <script>
                                                        $(document).ready(function() {
                                                            $.ajax({
                                                            type: "POST",
                                                            url: "get_medicine.php",
                                                            success: function(data) {
                                                                const medicines = JSON.parse(data);

                                                                const medicineSelect = document.querySelector('#medicine<?php echo $data['id']; ?>');
                                                                const dosageInput = document.querySelector('#dosage<?php echo $data['id']; ?>');
                                                                const frequencyInput = document.querySelector('#frequency<?php echo $data['id']; ?>');

                                                                medicineSelect.addEventListener('change', e => {
                                                                const selectedMedicine = e.target.value;
                                                                if (!selectedMedicine) {
                                                                    return;
                                                                }

                                                                const selectedMedicineData = medicines.find(medicine => medicine.medicine_name === selectedMedicine);
                                                                dosageInput.value = selectedMedicineData.dosage;
                                                                frequencyInput.value = selectedMedicineData.frequency;
                                                                });
                                                            }
                                                            });
                                                        });
                                                        </script>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="text" class="form-control" id="time_take<?php echo $data['id']; ?>" name="time_take" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <label for="time_take">&nbsp;&nbsp;&nbsp;Time to take (per hour)</label>
                                                                <div class="invalid-feedback">Please enter the time to take</div>
                                                            </div>                                         

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="date" class="form-control" id="from_date<?php echo $data['id']; ?>" name="from_date" required>
                                                                <label for="from_date">&nbsp;&nbsp;&nbsp;Start of taking</label>
                                                                <div class="invalid-feedback">Please enter start of taking</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4">
                                                                <input type="date" class="form-control" id="to_date<?php echo $data['id']; ?>" name="to_date" required>
                                                                <label for="to_date">&nbsp;&nbsp;&nbsp;End of taking</label>
                                                                <div class="invalid-feedback">Please enter end of taking</div>
                                                            </div>

                                                            <div class="col-md-3 form-group mb-4 invisible">
                                                                <input type="date" class="form-control" >                                                                
                                                            </div>

                                                                                                                      

                                                            <div class="col-md-3 form-group mb-4 invisible">
                                                                <input type="date" class="form-control" >                                                               
                                                            </div>

                                                            <div class="col-md-6 form-group mb-4">
                                                                <textarea type="tel" class="form-control" id="recomment2<?php echo $data['id']; ?>" name="recomment2" style="height: 100px;" required></textarea>
                                                                <label for="recomment2">&nbsp;&nbsp;&nbsp;Recommendation</label>
                                                                <div class="invalid-feedback">Please enter recommendation</div>
                                                            </div>

                                                                
                                                            </div>
                                                            <!-- End E-prescription -->

                                                            

                                                            
                                                            </form>
                                                            </div>


                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" id="saveperscriptionbutton<?php echo $data['id']; ?>">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div></div>
                                                        <!--End Modal -->  
                                                        
                                                        <script>
                                                            $(document).ready(function() {
                                                        $("#saveperscriptionbutton<?php echo $data['id']; ?>").click(function(e) {
                                                            e.preventDefault();
                                                            var height = $("#height<?php echo $data['id']; ?>").val().trim();
                                                            var medicine = $("#medicine<?php echo $data['id']; ?>").val();
                                                            var bloodtype = $("#bloodtype<?php echo $data['id']; ?>").val();
                                                            var weight = $("#weight<?php echo $data['id']; ?>").val().trim();
                                                            var bmi = $("#bmi<?php echo $data['id']; ?>").val().trim();
                                                            var bloodpressure = $("#bloodpressure<?php echo $data['id']; ?>").val().trim();
                                                            var pulse = $("#pulse<?php echo $data['id']; ?>").val().trim();
                                                            var temp = $("#temp<?php echo $data['id']; ?>").val().trim();
                                                            var oxygensaturation = $("#oxygensaturation<?php echo $data['id']; ?>").val().trim();
                                                            var info = $("#info<?php echo $data['id']; ?>").val().trim();

                                                            var recomment1 = $("#recomment1<?php echo $data['id']; ?>").val().trim();
                                                            var name = $("#name<?php echo $data['id']; ?>").val().trim();
                                                            var age = $("#age<?php echo $data['id']; ?>").val().trim();
                                                            var datenow = $("#datenow<?php echo $data['id']; ?>").val().trim();
                                                            var intake = $("#intake<?php echo $data['id']; ?>").val().trim();
                                                            var dosage = $("#dosage<?php echo $data['id']; ?>").val().trim();
                                                            var frequency = $("#frequency<?php echo $data['id']; ?>").val().trim();
                                                            var time_take = $("#time_take<?php echo $data['id']; ?>").val().trim();
                                                            var from_date = $("#from_date<?php echo $data['id']; ?>").val().trim();
                                                            var to_date = $("#to_date<?php echo $data['id']; ?>").val().trim();
                                                            var recomment2 = $("#recomment2<?php echo $data['id']; ?>").val().trim();
                                                            var isValid = true;

                                                            if (height === "") {
                                                            $("#height<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#height<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (bmi === "") {
                                                            $("#bmi<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#bmi<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (bloodpressure === "") {
                                                            $("#bloodpressure<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#bloodpressure<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (pulse === "") {
                                                                $("#pulse<?php echo $data['id']; ?>").addClass("is-invalid");
                                                                isValid = false;
                                                                } else {
                                                                $("#pulse<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                                }

                                                                if (temp === "") {
                                                                    $("#temp<?php echo $data['id']; ?>").addClass("is-invalid");
                                                                    isValid = false;
                                                                    } else {
                                                                    $("#temp<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                                    }    

                                                            if (bloodtype === null) {
                                                            $("#bloodtype<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#bloodtype<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (medicine === null) {
                                                            $("#medicine<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#medicine<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (weight === "") {
                                                            $("#weight<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#weight<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (oxygensaturation === "") {
                                                            $("#oxygensaturation<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#oxygensaturation<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (info === "") {
                                                            $("#info<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#info<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (recomment1 === "") {
                                                            $("#recomment1<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#recomment1<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (name === "") {
                                                            $("#name<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#name<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (age === "") {
                                                            $("#age<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#age<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (datenow === "") {
                                                            $("#datenow<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#datenow<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (intake === "") {
                                                            $("#intake<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#intake<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (dosage === "") {
                                                            $("#dosage<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#dosage<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (frequency === "") {
                                                            $("#frequency<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#frequency<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (time_take === "") {
                                                            $("#time_take<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#time_take<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (from_date === "") {
                                                            $("#from_date<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#from_date<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (to_date === "") {
                                                            $("#to_date<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#to_date<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                            if (recomment2 === "") {
                                                            $("#recomment2<?php echo $data['id']; ?>").addClass("is-invalid");
                                                            isValid = false;
                                                            } else {
                                                            $("#recomment2<?php echo $data['id']; ?>").removeClass("is-invalid");
                                                            }

                                                                if (isValid) {
                                                                    var formData = $("#addPerscriptionForm<?php echo $data['id']; ?>").serialize();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "perscription_process.php",
                                                                        data: formData,
                                                                        success: function(response) {
                                                                            if(response == "success"){
                                                                            Swal.fire(
                                                                            'Good job!',
                                                                            'You Successfully added the perscription!',
                                                                            'success'
                                                                            ).then(function() {
                                                                                window.location.reload();
                                                                            });
                                                                        }else if(response == "fail"){
                                                                            Swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Oops...',
                                                                                text: 'You already have an perscription',
                                                                                })
                                                                        }else {
                                                                            Swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Oops...',
                                                                                text: 'Something wrong with the code',
                                                                                })
                                                                        }
                                                                        console.log(response);
                                                                        },
                                                                        error: function(error) {
                                                                        alert("Error");
                                                                        console.error(error);
                                                                        }
                                                                    });                                                                    
                                                            }
                                                        });
                                                        });
                                                        </script>

                                                         <?php
                                                            
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
                            text: "You want to confirm this appointment?",
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
    <script src="js/scripts.js"></script>

</body>

</html>