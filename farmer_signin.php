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
					<h2 class="h2 text-center">Farmer | Customer <small>Login</small></h2><br><br><br><br>
						<?php
				        if(isset($_GET['error']))
						{
							?>
				            <div class='alert alert-danger col-md-6 col-sm-6 col-md-offset-3 text-center col-sm-offset-3'>
								<button class='close ' data-dismiss='alert'>&times;</button>
								<strong>Wrong Email or Password</strong> 
							</div>
				            <?php
						}
						if(isset($_GET['error1']))
						{
							?>
				            <div class='alert alert-danger col-md-6 col-sm-6 col-md-offset-3 text-center col-sm-offset-3'>
								<button class='close ' data-dismiss='alert'>&times;</button>
								<strong>ALLERT: Your Acount has been Temporarily Blocked  <br>
								</strong>for violating The FarmBase <a href="" data-toggle="modal" data-target="#messageForm" > Terms and Conditions</a><br>
								Please Contact our Admin if you still need our services. Thank You.<br>
								For more information, you can reach at <address>customercare@farmbase.com</address>
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
						<p>
							      <input type="checkbox" class="" name="check"   id="t&c"/>
							      <label for="t&c"> Remember Me</label>
							    </p>	
							<input type="submit" class="btn btn-primary btn-small green" name="btn-login" value="Sign In" />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							
							<a href="farmer_reset" class="login-link" alt="Forgot Password">Forgot Password?</a><br><br>
							<a href="farmer_signup" class="login-link" alt="Sign Up">Register Account</a><br>
							<a href="consultants" class="login-link" alt="Sign Up">Consultant Log In</a><br>
							<a href="index" class="login-link" alt="Sign Up">Back Home</a>
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


		<!--................message Pop Up..............-->
							
							 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" class="modal fade" id="messageForm">
								<div class="modal-dialog">
								
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="text-danger"> &times;</span></button>
											<h5 class="">FarmBase Terms and Conditions</h5>
										</div>
										<div class="modal-body">
											<article>
												<p>
													<span class="text-warning"> IMPORTANT NOTICE: Please read these terms and conditions before registering an account. The terms are:</span> <br>
													1. You are required to use your full original names in the app. Phone numbers are for reaching you, your exact phone numbers will help.<br>
													 2. Posts made should be valid and the imaages shared must be strictly an agricultural produce.<br>
													  3. Any user can register, but only those with valid posts are allowed to make such posts. Everybody can be a farmer.<br>
													 4. Use the Web App platform to grow your network. Sending spam requests is not allowed and won't build you as a farmer.<br>
													 <span class="text-danger">Disclaimar*</span><br>
													 Any violation of the above rules will lead to the user being blocked for few hours or even permanent blocking depending on the saverity of the violation.<br>
													 Take note of the above.<br>
													 <span class="text-success">Welcome to FarmBase for more farming connections. FarmBase, a palce where the Vision 2030 agricultural goals lie.</span>
												</p>
											</article>
										</div>
										<div class="modal-footer">
										<p class="nnot"><!-- Create an <a href="farmer_signin">account </a> with us today
										<br>
 -->										Thanks for choosing FarmBase.</p>
										</div>
									
								</div>
							</div>	
											
										
					   <!--........................end of message pop up..............-->
</html>