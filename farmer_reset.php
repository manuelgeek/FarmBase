<?php

session_start();
require_once 'class.farmer.php';
$farmer_reset = new FARMER();

if($farmer_reset->is_logged_in()!="")
{
	$farmer_reset->redirect('index');
}

if(isset($_POST['btn-reset']))
{
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone_no']);
	$upass = trim($_POST['password']);
	$upass_again = trim($_POST['password_again']);

	$stmt = $farmer_reset->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id AND phone='$phone'");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 0){
		$msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email or Phone no does not exist!
				</div>";
	}else {
		if($farmer_reset->reset_pass($email,$phone,$upass)){
			$msg3 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' >
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password Successfully changed. <a href='farmer_signin' >Log In to account </a>
				</div>";
		} else {
			$msg3 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Failed, Try again!
				</div>";
		}
	}
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
	
		<title>Farmer | Login</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 "><br><br><br><br>
					<h2 class="h2 text-center">Farmer <small>Reset Password</small></h2><br><br><br><br>
						<?php
							if(isset($msg3)){
								echo $msg3;
							}
							?>

					 <form action="" method="post" id="register-form">

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your Email here</label>
							  <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-email" required />
							  <span class="help-block" id="error"></span>
							  
							</div>

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your Phone Number</label>
							  <input type="number" name="phone_no" class="form-control login-field" value="" placeholder="Enter your phone No" id="login-no" required />
							  <span class="help-block" id="error"></span>
							  
							</div>
							

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-lock" for="login-pass"> Enter Your New Password</label>
							  <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="password" required />
							   <span class="help-block" id="error"></span>
							   

							</div>
							<div class="form-group col-md-12 col-sm-12">
							 <label class="login-field-icon fui-lock" for="login-pass">Confirm your new password</label>
							  <input type="password" name="password_again" class="form-control login-field" value="" placeholder="Confirm Password" id="login-pass" required />
							  <span class="help-block" id="error"></span>
							 
							</div>
							<div class="form-group col-md-12 col-sm-12">
							<input name="btn-reset" class="btn btn-primary  btn-block" onclick="return validate();" value="Reset Password" type="submit"/><br>
							

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