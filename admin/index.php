<?php
session_start();
	include_once 'class.admin.php';
	
	$admin_login = new ADMIN();

	if($admin_login->is_logged_in())
{
	$admin_login->redirect('home');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['email']);
	$upass = trim($_POST['password']);
	
	if($admin_login->login($email,$upass))
	{
		$admin_login->redirect('home');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="#SSS" rel="stylesheet" type="text/css" />
		 <link href="../css/style.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="../font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
	
		<title>Admin | Login</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 "><br><br><br><br>
					<h2 class="h2 text-center">Admin <small>Login</small></h2><br><br><br><br>
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
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" name="btn-login" value="Sign In" />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							
							<!-- <a href="#" class="login-link" alt="Forgot Password">Forgot Password?</a><br><br> -->
							
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
	<script type="text/javascript" src="../js/jquery2.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
</html>