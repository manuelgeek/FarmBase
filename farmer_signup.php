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
							      <label for="t&c">Agree to <a href="" data-toggle="modal" data-target="#messageForm" > Terms and Condition</a></label>
							    </p>		
							</div>
							</label>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="green btn btn-primary btn-small" id="btn-login" name="btn-register" value="Sign Up" onclick="return validate();" />
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
							<p>Already Have Account?<a href="farmer_signin" class="login-link" alt="">Log In</a></p>
							
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
									<div class="modal-content1">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">FarmBase Terms and Conditions</h4>
										</div>
										<div class="modal-body">
											<article>
												<p>
													IMPORTANCE OF COUNSELLING Counselling is important to the institution and even to the modern world. The importance are: <br>
													1. Counselling in marriage and relationship help people to bond better and make relationship smoother with fewer conflicts.<br>
													 2. Helps one improve the skills of decision making, reduce tension, maintain a better self-esteem and confidence and feel more positive and optimistic towards life.<br>
													  3. Many old age people who are often treated as commodity in the houses feed nee
												</p>
											</article>
										</div>
										<div class="modal-footer">
										<p class="nnot">Create an <a href="farmer_signin">account </a> with us today</p>
										</div>
									</div>
								</div>
							</div>	
											
										
					   <!--........................end of message pop up..............-->
		


</html>