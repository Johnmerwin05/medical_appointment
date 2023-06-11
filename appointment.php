<?php
include 'connection/database.php';
session_start();
if (!isset($_SESSION["email"]) || $_SESSION["email"] == false){

    header("Location: login/login-user.php");
    exit;
}
$email = $_SESSION['email'];

if ($conn) {

//echo "Connection successfully";  
}else{  
    echo "Error";  
}  
$query="SELECT * FROM usertable WHERE email = '$email'";  
$connect=mysqli_query($conn,$query);  
$num=mysqli_num_rows($connect);



if ($num > 0) {
  while ($data = mysqli_fetch_assoc($connect)) {


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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">Pila.Laguna@gmail.com</a>
        <i class="bi bi-phone"></i> +63 9123456789
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
  
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Making an appointment at Pila Medical Center is easy and convenient. Our website allows you to schedule your appointment online, so you can book a time that works for you without having to make a phone call.</p>
        </div>

        <form action="" method="post" id="appointment-form">
        <input style="margin-top:-3%; color: #737373;" type="text" class="form-control invisible" id="phoneInput" placeholder="name@example.com" name="province" value="<?= $data['province'] ?>" readonly>
        <input style="margin-top:-3%; color: #737373;" type="text" class="form-control invisible" id="phoneInput" placeholder="name@example.com" name="city" value="<?= $data['city'] ?>" readonly>
        <input style="margin-top:-3%; color: #737373;" type="text" class="form-control invisible" id="phoneInput" placeholder="name@example.com" name="barangay" value="<?= $data['barangay'] ?>" readonly>
        <input style="margin-top:-3%; color: #737373;" type="text" class="form-control invisible" id="phoneInput" placeholder="name@example.com" name="age" value="<?= $data['age'] ?>" readonly>
        <input style="margin-top:-3%; color: #737373;" type="text" class="form-control invisible" id="phoneInput" placeholder="name@example.com" name="gender" value="<?= $data['gender'] ?>" readonly>
          <div class="row">

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="nameInput" placeholder="name@example.com" name="name" value="<?= $data['firstname'], " ", $data['middlename'], " ",$data['lastname'] ?>" readonly>
              <label for="nameInput" style="padding-left: 35px; color: #696969;">Full name</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="phoneInput" placeholder="name@example.com" name="email" value="<?= $data['email'] ?>" readonly>
              <label for="phoneInput" style="padding-left: 35px; color: #696969;">Email address</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="phoneInput" placeholder="name@example.com" name="phone" value="<?= $data['phone'] ?>" readonly>
              <label for="phoneInput" style="padding-left: 35px; color: #696969;">Phone number</label>
            </div>

            <?php
  }
}

    ?>

              <div class="col-md-4 form-floating mb-3">
              <select class="form-select" id="departmentrSelect" style="padding-left: 25px; color: #737373;" name="department">
                <option value="" disabled selected hidden>Select Department</option>
                <option value="OB/GYN">OB/GYN</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Orthopedics">Orthopedics</option>
              </select>
              <label for="departmentrSelect" style="padding-left: 35px; color: #696969;">Departments</label>
              
            </div>
            

            <div class="col-md-4 form-floating mb-3">
              <select class="form-select" id="doctorSelect" style="padding-left: 25px; color: #737373;" name="doctor">
                <option value="" disabled selected hidden>Select a Doctor</option>
                <!-- ======= list of doctor that match on selected department ======= -->

              </select>
              <label for="doctorSelect" style="padding-left: 35px; color: #696969;">Active Doctors</label>
              
            </div>

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="locationInput" placeholder="name@example.com" name="clinic_loc" readonly><!-- ======= display location based on selected doctor ======= -->
              <label for="locationInput" style="padding-left: 35px; color: #696969;">Clinic location</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="contactInput" placeholder="name@example.com" name="contact" readonly><!-- ======= display phone number based on selected doctor ======= -->
              <label for="contactInput" style="padding-left: 35px; color: #696969;">Doctor Contact number</label>
            </div>

            <script>
              //ajax
            $(document).ready(function() {
              $.ajax({
                type: "POST",
                url: "get_doctors.php",
                success: function(data) {
                  const doctors = JSON.parse(data);

                  const departmentSelect = document.querySelector('#departmentrSelect');
                  const doctorSelect = document.querySelector('#doctorSelect');
                  const locationInput = document.querySelector('input[name="clinic_loc"]');
                  const phoneInput = document.querySelector('input[name="contact"]');

                  departmentSelect.addEventListener('change', e => {
                    doctorSelect.innerHTML = `<option value="" disabled selected hidden>Select a Doctor</option>`;
                    locationInput.value = '';
                    phoneInput.value = '';
                    const selectedSpecialization = e.target.value;
                    if (!selectedSpecialization) {
                      return;
                    }

                    const matchingDoctors = doctors.filter(doctor => doctor.specialization === selectedSpecialization);
                    matchingDoctors.forEach(doctor => {
                      const option = document.createElement('option');
                      option.value = doctor.name;
                      option.innerText = doctor.name;
                      doctorSelect.appendChild(option);
                    });
                  });

                  doctorSelect.addEventListener('change', e => {
                    locationInput.value = '';
                    phoneInput.value = '';
                    const selectedDoctorName = e.target.value;
                    if (!selectedDoctorName) {
                      return;
                    }

                    const selectedDoctor = doctors.find(doctor => doctor.name === selectedDoctorName);
                    locationInput.value = selectedDoctor.location;
                    phoneInput.value = selectedDoctor.phone;
                  });
                }
              });
            });
            </script>

            <div class="col-md-4 form-floating mb-3">
              <input style="padding-left: 30px; color: #737373;" type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy" name="date">
              <label for="datepicker" style="padding-left: 35px; color: #696969;">Appointment date</label>
            </div>

            <div class="col-md-4 form-floating mb-3">
            <select class="form-select" id="timeSelect" style="padding-left: 25px; color: #737373;" name="time">
                <option value="" disabled selected hidden>Select a time</option>
            </select>
            <label for="timeSelect" style="padding-left: 35px; color: #696969;">Available time</label>
            </div>

          <div class="form-floating mt-3">
            <textarea style="padding-left: 25px; color: #737373; height: 130px;" class="form-control" name="message" rows="5" placeholder="Message (Optional)" id="floatingTextarea"></textarea>
            <label for="floatingTextarea" style="padding-left: 35px; color: #696969;">Message (Optional)</label>
          </div>
          <div class="text-center mt-5">
            <button type="submit" class="appointment-btn" style="border: none;">Make an Appointment</button>
          </div>
        </form>

      </div>
    </section><!-- End Appointment Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Pila Medical Center is a state-of-the-art healthcare facility located in the heart of Pila, Laguna. Our dedicated team of medical professionals are committed to providing exceptional and compassionate care to our patients.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Pila Medical Center is a state-of-the-art healthcare facility located in the heart of Pila, offering a wide range of medical services to its patients. With a team of highly trained and experienced doctors and staff, Pila Medical Center is committed to providing quality medical care in a warm and welcoming environment.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" >
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-1">How can I book an appointment at Pila Medical Center online? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  To book an appointment at Pila Medical Center online, simply visit their appointment website, select a desired date and time, and fill in your personal information. Once your appointment has been confirmed, you will receive a confirmation email.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Is there any availability for a same-day appointment at Pila Medical Center? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  It depends on the availability of doctors and appointment slots. It is recommended to check the availability on the Pila Medical Center appointment website or to contact their customer service for assistance.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Can I reschedule or cancel my appointment at Pila Medical Center through the website? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Yes, you can reschedule or cancel your appointment at Pila Medical Center through the website. Simply log in to your account and follow the instructions to modify or cancel your appointment.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">How do I know if my appointment has been confirmed by Pila Medical Center? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Once you have booked an appointment at Pila Medical Center, you will receive a confirmation email. You can also check the status of your appointment by logging in to your account on the appointment website.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Is there a fee for booking an appointment through the Pila Medical Center website? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  It is unclear if there is a fee for booking an appointment through the Pila Medical Center website as this information is not specified. It is recommended to contact Pila Medical Center customer service for further information.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->



    

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