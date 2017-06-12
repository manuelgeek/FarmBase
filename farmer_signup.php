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
		<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
		
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
							<div>
							<!-- <label for="t&c">
								<input type="checkbox" class="" name="check" required  id="t&c"/> &nbsp; &nbsp;Agree to Terms and Conditions -->
								<p>
							      <input type="checkbox" class="" name="check" required  id="t&c"/>
							      <label for="t&c">Read the <a href="" data-toggle="modal" data-target="#messageForm" > Terms and Condition</a> and Agree</label>
							    </p>		
							</div>
							</label>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="green btn btn-primary btn-small" id="btn-login" name="btn-register" value="Sign Up" onclick="return validate();" />
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
							<p>Already Have Account?<a href="farmer_signin" class="login-link" alt="">Log In</a></p><br>
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
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>

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