<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>
<style>
     .custom-select{
  /* wrapper style */
  position: relative;
  display:block;
  max-width: 400px;
  min-width: 180px;
  margin:0 auto;
}

  select {
    border: 2px solid #740e74;
    outline:none;
    background: transparent;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0;
    margin:0;
    display:block;
    width: 100%;
    cursor: pointer; 
    padding: 12px 55px 15px 15px;
    font-size: 14px;
  }
</style>
<body>
<div class="center">
<h1>SIGN UP</h1>
<form action="signup-check.php" method="post">
    <br>
    <div class="form-group">
        <select class="form-control" name="level" id="position-select" required>
            <option selected="true" disabled="disabled">Choose Position</option>
            <option value="Admin">Admin</option>
            <option value="Secretary">Secretary</option>
            <option value="Doctor">Doctor</option>
        </select>
    </div>

    <div class="form-group txt_field" style="margin-top:5%; display:none;" id="doctor-select">
        <select class="form-control" name="fullname" required>
            <option selected="true" disabled="disabled">Choose Doctor</option>
            <?php
            include '../../connection/database.php';
            $sql = "SELECT doctor_name FROM doctor";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['doctor_name'] . "'>" . $row['doctor_name'] . "</option>";
            }
            ?>
        </select>
    </div>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <div class="txt_field" id="full-name-input">
     <input type="text" name="name" ><br>
        <span></span>
        <label>Full Name</label>
    </div>

    <div class="txt_field">
        <input type="text" name="uname"><br>
        <span></span>
        <label>User Name</label>
    </div>

    <div class="txt_field">
        <input type="password"
               name="password"><br>
        <span></span>
        <label>Password</label>
    </div>

    <div class="txt_field">
        <input type="password"
               name="re_password"><br>
        <span></span>
        <label>Confirm Password</label>
    </div>

    <input type="submit" value="Sign Up">
    <div class="signup_link"><a href="index.php"></a></div>

    <script>
        // Toggle doctor select when "Doctor" is selected in position select
        const positionSelect = document.getElementById("position-select");
        const doctorSelect = document.getElementById("doctor-select");
        const fullNameInput = document.getElementById("full-name-input");
        positionSelect.addEventListener("change", () => {
            if (positionSelect.value === "Doctor") {
                doctorSelect.style.display = "block";
                fullNameInput.style.display = "none";
            } else {
                doctorSelect.style.display = "none";
                fullNameInput.style.display = "block";
            }
        });
    </script>
</form>
</body>
</html>