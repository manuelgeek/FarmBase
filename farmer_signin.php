<?php
	include_once 'class.farmer.php';
	// include 'login.php';

	$farmer_signin = new FARMER();

	if($farmer_signin->is_logged_in()!="")
{
	$farmer_signin->redirect('index');
}


session_start();
require_once 'class.farmer.php';
$farmer_login = new FARMER();


if(isset($_POST['btn-login']))
{
	$email = trim($_POST['email']);
	$upass = trim($_POST['password']);
	
	if($farmer_login->login($email,$upass))
	{
		if(isset($_SESSION['redirect_url'])){
			$redirect_url = (isset($_SESSION['redirect_url'])) ? $_SESSION['redirect_url'] : '/';
			unset($_SESSION['redirect_url']);
			header("Location: $redirect_url", true, 303);
		} else {
		$farmer_login->redirect('index');
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
		<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
		<?php
			include 'csslink.php';
		?>
		<title>Farmer | Login</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 "><br><br><br><br>
					<h2 class="h2 text-center">Farmer <small>Login</small></h2><br><br><br><br>
						<?php
				        if(isset($_GET['error']))
						{
							?>
				            <div class='alert alert-danger col-md-6 col-sm-6 col-md-offset-3 text-center col-sm-offset-3'>
								<button class='close ' data-dismiss='alert'>&times;</button>
								<strong>Wrong Details</strong> 
							</div>
				            <?php
						}
						?>

					<form method="post" class="">
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="email" class="form-control" name="email" placeholder="Enter your email" required />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter Your Password" required />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="submit" class="btn btn-primary btn-small green" name="btn-login" value="Sign In" />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<div><input type="checkbox" class="" name="rem"   />Remember Me</div><br>
							<a href="farmer_reset" class="login-link" alt="Forgot Password">Forgot Password?</a><br><br>
							<a href="farmer_signup" class="login-link" alt="Sign Up">Register Account</a><br>
							<a href="consultants" class="login-link" alt="Sign Up">Consultant Log In</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php 

	//footer
	include 'footer.php';

	?>
	</body>
	<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
</html>