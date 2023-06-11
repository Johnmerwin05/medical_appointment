<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link href="../assets/img/rrr1.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">    

    <style>
    @media only screen and (max-width: 600px) {
    .container{
        margin-top: 75%;
        margin-bottom: 15%;
        width: 92%;
        box-shadow: 2px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      
  }
  
  }

    </style>

<script>
      function setDefaultCode() {
        document.getElementById("phone").value = "+63";
      }

      function restrictDelete(event) {
        var code = "+63";
        var phone = document.getElementById("phone").value;
        if (phone.length <= code.length) {
          document.getElementById("phone").value = code;
        }
      }
    </script>
    
</head>
<body onload="setDefaultCode()">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 form">
            <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group row">
                    <div class="col-sm-4 mb-3">
                        <input class="form-control" type="text" name="firstname" placeholder="First name" required>
                    </div>

                    <div class="col-sm-4 mb-3">
                        <input class="form-control" type="text" name="middlename" placeholder="Middle name" required>
                    </div>

                    <div class="col-sm-4 mb-3">
                        <input class="form-control" type="text" name="lastname" placeholder="Last name" required>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <select class="form-control text-secondary" id="civil-status" name="statuss">
                            <option value="">Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>

                    <div class="col-sm-5 mb-3">
                        <input class="form-control text-secondary" type="email" name="email" placeholder="Email Address" required>
                    </div>

                    <div class="col-sm-4 mb-3">
                        <input class="form-control text-secondary" id="phone" type="text" name="phone" pattern="\+\d{2,}[\d\s]{7,}" placeholder="Phone number" minlength="13" maxlength="13" required oninput="restrictDelete()" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" title="Password add +63">
                    </div>


                    <div class="col-sm-6 mb-3">
                        <input type="hidden" name="region"/>
                        <select class="form-control text-secondary" id="region-selector">                     
                        </select>
                        
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="hidden" name="province"/>
                        <select class="form-control text-secondary" id="province-selector">
                        </select>
                        
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="hidden" name="city"/>
                        <select class="form-control text-secondary" id="city-selector" >
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="hidden" name="barangay"/>
                        <select class="form-control text-secondary" id="barangay-selector">
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input class="form-control text-secondary" type="text" placeholder="Enter birthday" name="birthday" id="birthday" onchange="calculateAge()" onfocus="(this.type='date')" required>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input class="form-control text-secondary" type="number" name="age" placeholder="Age" id="age" readonly>
                    </div>

                    <div class="col-sm-3 mb-3">
                        <select class="form-control text-secondary"  name="gender">
                        <option value="" disabled selected hidden>Gender</option> 
                        <option value="Male">Male</option> 
                        <option value="Female">Female</option> 
                        </select>
                    </div>
                    

                    <div class="col-sm-6 mb-3">
                        <input class="form-control text-secondary" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 characters long" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input class="form-control text-secondary" type="password" name="cpassword" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase letter, one lowercase letter, and be at least 8 characters long" required>
                    </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php" style="text-decoration: none;">Login here</a></div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.ph-locations-v1.0.1.js"></script>
    <script type="text/javascript">
			$(document).ready(function(){
				var my_handlers = {
					fill_provinces:  function(){
						var region_code = $(this).val();	
						$('#province-selector').ph_locations('fetch_list', [{"region_code": region_code}]);
					},
					fill_cities: function(){
						var province_code = $(this).val();
						$('#city-selector').ph_locations( 'fetch_list', [{"province_code": province_code}]);
					},
					fill_barangays: function(){
						var city_code = $(this).val();
						$('#barangay-selector').ph_locations('fetch_list', [{"city_code": city_code}]);
					}
				};
				$('#region-selector').ph_locations({'location_type': 'regions'});
				$('#province-selector').ph_locations({'location_type': 'provinces'});
				$('#city-selector').ph_locations({'location_type': 'cities'});
				$('#barangay-selector').ph_locations({'location_type': 'barangays'});
				$('#region-selector').ph_locations('fetch_list');
				$('#region-selector').change(my_handlers.fill_provinces);
				$('#province-selector').change(my_handlers.fill_cities);
				$('#city-selector').change(my_handlers.fill_barangays); 

			});
		</script>

        <script>
        function calculateAge() {
            var birthday = new Date(document.getElementById("birthday").value);
            var today = new Date();
            var age = today.getFullYear() - birthday.getFullYear();
            var m = today.getMonth() - birthday.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                age--;
            }
            document.getElementById("age").value = age;
        }
        </script>

        <script>
            $(function(){
            $('#region-selector, #province-selector, #city-selector, #barangay-selector').on('change', function(){
            var selected_caption = $("option:selected", this).text();
            var input_name = $(this).attr('id').replace('-selector', '');
            $('input[name=' + input_name + ']').val(selected_caption);
            });
            $('#region-selector').ph_locations('fetch_list');
            });

        </script>

        <script>
            $( function() {
        $( "#birthday" ).datepicker();
        } );
        </script>
</body>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>