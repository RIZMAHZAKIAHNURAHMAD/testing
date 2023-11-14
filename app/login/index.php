<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Politik Booster</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo2.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../assets/login/css/main.css"> 
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background: url('../../assets/img/banner/login.jpg')">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login.php" method="post">
					<?php 
						if(isset($_GET['pesan'])){
							if($_GET['pesan']=="gagal"){
								echo "<div class='alert bg-danger'><b>Username dan Password Anda salah !</b></div>";
							}
						}
						?>
					<span class="login100-form-title p-b-26">
						Welcome
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: example@gmail.com">
						<input class="input100" type="text" name="email" placeholder="Email Address" autofocus>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>