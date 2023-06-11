<?php
include 'connection/database.php';
session_start();
if (!isset($_SESSION["email"]) || $_SESSION["email"] == false){

    header("Location: login/login-user.php");
    exit;
}
$ticket = $_GET['ticket'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pila Medical Center</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>

@media print { 
  #dontme {
    display: none;
  }
  #gg {
    margin-left: 5%;
    font-size: 20px;
  }
  #head{
    margin-top: -10%;

  }
  #dtHorizontalExample{
    font-size: 15px;
  }

  #notme {
    display: none;
  }
  #lahat {
  display: flex;
  flex-wrap: wrap;
  margin-left: 10%;
  margin-top: 5%;
}

.col-md-6 {
  flex-basis: 50%;
  max-width: 50%;
}
  #title{
    margin-left: 35%;
    font-size: 40px;
  }
}
  </style>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">Pila.Laguna@gmail.com</a>
        <i class="bi bi-phone"></i> +639123456789
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">PilaMed</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.html#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="about.html">About</a></li>
          <li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.html#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="doctors.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><span><i class="fa-regular fa-user" style="font-size: 15px; padding-right: 5px; font-weight: 800;"></i></span></a>
            <ul>
            <li><a href="profile.php">Profile</a></li>
              <li><a href="report.php">Appointments</a></li>
              <li><a href="login/logout-user.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="appointment.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->

    <br><br><br><br>
    <?php
 
                    $query="SELECT * FROM percription_data WHERE ticket = '$ticket'";  
                    $connect=mysqli_query($conn,$query);  
                    $num=mysqli_num_rows($connect);
                    
                    
                    
                    if ($num > 0) {
                        while ($data = mysqli_fetch_assoc($connect)) {
                            $doctor = $data['doctor'];
                    
                    

                ?>
    

    <div class="container rounded bg-white mt-5 mb-5" id="print-me">
    <div class="row">
        <div class="col-md-4 border-right" id="head">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <?php
 
                    $querys="SELECT * FROM doctor WHERE doctor_name = '$doctor'";  
                    $connects=mysqli_query($conn,$querys);  
                    $nums=mysqli_num_rows($connects);
                    
                    
                    
                    if ($nums > 0) {
                        while ($datas = mysqli_fetch_assoc($connects)) {
                    
                    

                ?>
                <img class="rounded-circle mt-5" width="150px" src="admin/uploads/<?= $datas['logo'];?>">               
                <span class="font-weight-bold"><?= $datas['doctor_name'] ?></span>
                <span class="text-black-50"><?= $datas['doctor_location']; ?></span>
                <span class="text-black-50"><?= $datas['doctor_phone']; ?></span>

                <?php
                        }}

                ?>
                <span> </span>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3" id="name">
                    <h4 class="text-right" id="title">Prescription</h4>
                </div>
                <div class="row mt-1" id="input-container" >

                    <div class="row" id="lahat">
                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Name of patients:</p>
                        <p class="text-black-50 p-1"><?= $data['name']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Age of patients:</p>
                        <p class="text-black-50 p-1"><?= $data['age']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Name of doctor:</p>
                        <p class="text-black-50 p-1"><?= $data['doctor']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Date:</p>
                        <p class="text-black-50 p-1"><?= $data['datenow']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Medicine:</p>
                        <p class="text-black-50 p-1"><?= $data['medicine']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Amount to take:</p>
                        <p class="text-black-50 p-1"><?= $data['intake']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Dosage:</p>
                        <p class="text-black-50 p-1"><?= $data['dosage']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Frequency:</p>
                        <p class="text-black-50 p-1"><?= $data['frequency']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Time to take:</p>
                        <p class="text-black-50 p-1"><?= $data['time_take']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Start at:</p>
                        <p class="text-black-50 p-1"><?= $data['from_date']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">End at:</p>
                        <p class="text-black-50 p-1"><?= $data['to_date']; ?> </p>
                    </div>

                    <div class="col-md-6 mb-2 d-flex">
                        <p class="text-black-50 p-1" style="font-weight:800;">Recommendation:</p>
                        <p class="text-black-50 p-1"><?= $data['recomment2']; ?> </p>
                    </div>

                </div>
                

                <div class="mt-3 text-center" id="dontme">
                    <a href="javascript:history.back()"><button class="btn btn-secondary">Back</button></a>
                    <button class="btn btn-primary" type="button" onclick="printContent('print-me')">Download</button>
                </div>

            </div>
        </div>

                <?php
    }
}

?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PilaMed</h3>
            <p>
              Pila, Laguna <br>
              4010<br>
              Philippines <br><br>
              <strong>Phone:</strong> +63 912345678<br>
              <strong>Email:</strong> Pila.Laguna@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Departments</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Appointment</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Departments</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Appointment</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>We offer a wide range of medical services and specialties to meet the diverse needs of our patients.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>PilaMed</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>