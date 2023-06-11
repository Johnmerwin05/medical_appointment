<?php
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
      function setDefaultCode() {
        document.getElementById("doctor_name").value = "Dr. ";
      }

      function restrictDelete(event) {
        var code = "Dr. ";
        var phone = document.getElementById("doctor_name").value;
        if (phone.length <= code.length) {
          document.getElementById("doctor_name").value = code;
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
font-size: 22.5px;
margin-left: 2%
}
.view{
color: #2B547E;
font-size: 23px;
}
.approve {
color: #66CDAA;
font-size: 23px;
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
button.view {
    display: block;
    width: 100px;
    font-size: 12px;
    height: 35px;
    background: #4E9CAF;
    padding: 5px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    line-height: 25px;
    border: none;
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

.form-group #profile{
    margin-top: -20%;
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


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Medicine's Information</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="view float-right mr-2" type="button" data-toggle="modal" data-target="#addDoctorModal"><i class="fa-solid fa-plus"></i> Add New</button>                             
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addDoctorModalLabel">New Medicine</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addmedicineForm" method="post" enctype="multipart/form-data">
                                <div class="row">

                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                                    <label for="medicine_name">&nbsp;&nbsp;&nbsp;Medicine Name</label>
                                    <div class="invalid-feedback">Please enter medicine name</div>
                                </div>

                                 <div class="col-md-6 form-group mb-4">
                                    <input type="text" class="form-control" id="dosage" name="dosage" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    <label for="dosage">&nbsp;&nbsp;&nbsp;Dosage (mg)</label>
                                    <div class="invalid-feedback">Please enter dosage</div>
                                </div>
                                
                                <div class="col-md-6 form-group mb-4">
                                    <select type="text" class="form-control" id="frequency" name="frequency" required>
                                    <option value="" disabled selected hidden></option>
                                    <option value="Once daily">Once daily</option>
                                    <option value="Twice daily">Twice daily</option>
                                    <option value="Thrice daily">Thrice daily</option>
                                    <option value="As needed">As needed</option>
                                    </select>
                                    <label for="frequency">&nbsp;&nbsp;&nbsp;Frequency (per day)</label>
                                    <div class="invalid-feedback">Please enter frequency</div>
                                </div>
                                
                                <div class="col-md-6 form-group mb-4">
                                    <input type="text" class="form-control" id="duration" name="duration" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    <label for="duration">&nbsp;&nbsp;&nbsp;Duration (in days)</label>
                                    <div class="invalid-feedback">Please enter duration</div>
                                </div>  

                                <div class="col-md-6 form-group mb-4">
                                <input type="text" class="form-control" id="intake" name="intake" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <label for="intake">&nbsp;&nbsp;&nbsp;Number of Capsules</label>
                                <div class="invalid-feedback">Please enter number of capsule</div>
                            </div>

                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="save" id="saveDoctorBtn">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!--End Modal --> 
                        
                        <script>
                        $(document).ready(function() {
                        $("#saveDoctorBtn").click(function(e) {
                            e.preventDefault();
                            var medicine_name = $("#medicine_name").val().trim();
                            var intake = $("#intake").val().trim();
                            var dosage = $("#dosage").val().trim();
                            var frequency = $("#frequency").val();
                            var duration = $("#duration").val().trim();
                            var isValid = true;

                            if (medicine_name === "") {
                            $("#medicine_name").addClass("is-invalid");
                            isValid = false;
                            } else {
                            $("#medicine_name").removeClass("is-invalid");
                            }
                            if (intake === "") {
                            $("#intake").addClass("is-invalid");
                            isValid = false;
                            } else {
                            $("#intake").removeClass("is-invalid");
                            }

                            if (dosage === "") {
                            $("#dosage").addClass("is-invalid");
                            isValid = false;
                            } else {
                            $("#dosage").removeClass("is-invalid");
                            }

                            if (frequency === null) {
                            $("#frequency").addClass("is-invalid");
                            isValid = false;
                            } else {
                            $("#frequency").removeClass("is-invalid");
                            }

                            if (duration === "") {
                            $("#duration").addClass("is-invalid");
                            isValid = false;
                            } else {
                            $("#duration").removeClass("is-invalid");
                            }

                            if (isValid) {
                            var formData = $("#addmedicineForm").serialize();
                            $.ajax({
                                type: "POST",
                                url: "medicine_process.php",
                                data: formData,
                                success: function(response) {
                                    if(response == "success"){
                                    Swal.fire(
                                    'Good job!',
                                    'You Successfully added new medicine!',
                                    'success'
                                    ).then(function() {
                                        window.location.reload();
                                    });
                                }else if(response == "fail"){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'You already have this medicine',
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


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                        <th style="white-space:nowrap">ID no.</th>
                                            <th style="white-space:nowrap">Medicine name</th>
                                            <th style="white-space:nowrap">Dosage (mg)</th>
                                            <th style="white-space:nowrap">Frequency (per day)</th>
                                            <th style="white-space:nowrap">Duration (in days)</th>
                                            <th style="white-space:nowrap">Quantity</th>
                                            <th style="white-space:nowrap">Action</th>
                                            
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
                                $query="SELECT * FROM medicine";   
                                $connect=mysqli_query($conn,$query);  
                                $num=mysqli_num_rows($connect);
                                
                                                    
                                                    
                                                if ($num>0) {  
                                                    while($data=mysqli_fetch_assoc($connect)){
                                                        
                                                        
                                                        ?>

                                                            <tr style="font-size: 14px;color: #2B547E;font-weight:bold;padding-left: 15%;">  
                                                            <td><?= $bill++; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['medicine_name']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['dosage']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['frequency']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['duration']; ?></td>
                                                            <td style="white-space:nowrap"><?= $data['quantity']; ?> pcs</td>

                                                            <td > 
                                                            <a href="delete/medicine_delete.php?id=<?= $data['id']; ?>" class="delete"><i class='fa-solid fa-rectangle-xmark xmark' style="margin-left:10px;"></i></a>  </td>
                                                            </tr>                                                                                                                                                                   

                                                         <?php
                                                            
                                                    }  
                                                }  
                                        ?>  
                                </table>
                            </div>
                        </div>
                    </div>
                    


                    </script>
                    
                    <script>
                        $('.delete').on('click', function(e){
                            e.preventDefault();
                            const href = $(this).attr('href')

                            Swal.fire({
                            title: 'Are you sure?',
                            text: "you want to delete this medicine?",
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Financial Statement 2022-2023</span>
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