<?php
include_once 'class.farmer.php';
include 'register.php';
$farmer_signup = new FARMER();

if($farmer_signup->is_logged_in())
{
	$farmer_signup->redirect('index.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="#SSS" rel="stylesheet" type="text/css" />
		 <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
	
		<title>Farmer | Register</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="h2 text-center">Farmer <small>Register</small></h2>
					 <div class="col-md-8 col-md-offset-2 form-group" id="error1">
					        <!-- error will be shown here ! -->
					        </div>
					<?php if(isset($msg)) echo $msg;  ?>
					 
					<form method="post" id="register-form">
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Full Name:</label>
							<input type="text" class="form-control login-field" name="full_name" placeholder="Enter Full Names" id="login-name" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Email:</label>
							<input type="email" class="form-control login-field" name="email" placeholder="Enter your Email" id="login-email" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Phone No:</label>
							<input type="number" class="form-control login-field" name="phone_no" placeholder="Enter Phone NO" id="login-no" required />
							<span class="help-block " id="error"></span>
						</div>
						
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Password:</label>
							<input type="password" class="form-control login-field" name="password" placeholder="Enter Your Password" id="password" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Confirm Password:</label>
							<input type="password" class="form-control login-field" name="password_again" placeholder="Confirm Your Password" id="login-pass" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<div><input type="checkbox" class="" name="check" required  /> &nbsp; &nbsp;Agree to Terms and Conditions</div>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" id="btn-login" name="btn-register" value="Sign Up" onclick="return validate();" />
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
							<p>Already Have Account?<a href="farmer_signin" class="login-link" alt="">Log In</a></p>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p>&copy; &nbsp;<?php echo date('Y'); ?> &nbsp;All Rights Reserved </p>
				</div>
				
			</div>
		</footer>
	</body>
	<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
		


</html>