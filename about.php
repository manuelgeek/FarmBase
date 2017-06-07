<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_about = new FARMER();

if(!$farmer_about->is_logged_in())
{
	$_SESSION['redirect_url'] = $_SERVER['PHP_SELF']; 
}

if($farmer_about->is_logged_in()){
$stmt = $farmer_about->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['photo']=="") {
	$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px />";
	}
}
	$admin_about = new CONSULTANT();

	if($admin_about->is_logged_in()){
	$stmt = $admin_about->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$_SESSION['consultantSession']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($row['photo']=="") {
		$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px width=50px />";
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
		 <link rel="stylesheet" href="css/animate.css">
		<!--  <link rel="stylesheet" href="css/materialize/css/materialize.min.css"> -->
			<link rel="stylesheet" href="css/material-inputs.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
	
		<title>Farmer | About </title>
	</head>
	<body>
	<section>
		<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">Farmers</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index">Home</a></li>
            <li><a href="blog">Blog</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <li class="active"><a href="about">About Farmbase</a></li>
          </ul>
          	
          <ul class="nav navbar-nav navbar-right">
          	
            
           <?php
if($farmer_about->is_logged_in()) {
 	?>
 	<li id="header_inbox_bar" class="dropdown">
               <!-- messages in inbox here -->         
  </li>
                    <!-- inbox dropdown end -->
 	<li><a href="farmer_post"><span class="glyphicon glyphicon"></span>&nbsp;Post Produce Ad</a></li>
	 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

              	<?php
					if(isset($pic)){
						echo $pic;
					} else { ?>									

					<img class="img-circle " src="farmer_images/<?php echo $row['photo']; ?>"  style=" padding:0px;"  height=50px />
				<?php
				}?>
			  <span class=""></span>&nbsp; <?php echo $row['name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
            
                <li><a href="farmer_profile"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit Profile</a></li>
                <li><a href="message_favs"><span class="glyphicon glyphicon-star"></span>&nbsp;Favourites</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li><?php } ?>
         <?php if(!$farmer_about->is_logged_in() AND !$admin_about->is_logged_in() )  {
 	?>

            	<li><a href="farmer_signin" title="login">Login</a></li>           <?php }
     ?>

 <?php
if($admin_about->is_logged_in() ) {
 	?>
 	<li id="header_inbox" class="dropdown">
               <!-- messages in inbox here -->         
  </li>
                    <!-- inbox dropdown end -->
 	<li><a href="consultants/home"><span class="glyphicon glyphicon"></span>&nbsp;Post Message</a></li>
	 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

              	<?php
					if(isset($pic)){
						echo $pic;
					} else { ?>									

					<img class="img-circle " src="consultants/consult_images/<?php echo $row['photo']; ?>"  style=" padding:0px;"  height=50px />
				<?php
				}?>
			  <span class=""></span>&nbsp; <?php echo $row['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="consultants/consultant_profile"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit Profile</a></li>
                <li><a href="consultants/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li><?php } ?>

          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>


    <div class="clearfix"></div>


		<div class="container" id="home">
			<div class="row">
				<div class="col-md-12 __about" id="home1">
					<div class="col-md-8 col-md-offset-2" >
						
						<h2> About Us</h2>
						<p>
							This project is supposed to help farmers advertise their products and get help from profesional agricultural extension officers.
							It is more of a convinience tool that leverages on current web app development technologies.
						</p>
					</div>
				</div>
				<div class="col-md-12" id="contact">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2>Contact Us</h2>
							<p> We value your feed back. Thank you for contacting us.</p><br><br>
						</div>
						<div class="col-md-12" >
							<div class="col-md-7">
								<div class="well">
								    <form role="form" id="contactForm" data-toggle="validator" class="shake">
								        <div class="row">
								            <div class="form-group col-sm-6">
								                <label for="name" class="h5">Name</label>
								                <input type="text" class="form-control" id="name" placeholder="Enter name" required data-error="Enter Name">
								                <div class="help-block with-errors"></div>
								            </div>
								            <div class="form-group col-sm-6">
								                <label for="email" class="h5">Email</label>
								                <input type="email" class="form-control" id="email" placeholder="Enter email" required data-error="Enter your Email">
								                <div class="help-block with-errors"></div>
								            </div>
								        </div>
								        <div class="form-group">
								            <label for="message" class="h5 ">Message</label>
								            <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required data-error="Enter your message"></textarea>
								            <div class="help-block with-errors"></div>
								        </div>
								        <button type="submit" id="form-submit" class="btn btn-success  pull-right ">Submit</button>
								        <div id="msgSubmit" class="h5 text-center hidden"></div>
								        <div class="clearfix"></div>
								    </form>
								 </div>
							</div>
							<div class="col-md-5">
								<div class="col-md-10 col-md-offset-1">
									<h3>Address</h3>
									<address>
										<p><b>Location: </b>Kitui, 40333</p><br>
										<p><b>Email :</b>farming@gmail.com</p>
									</address><hr>
									<h3>Follow us</h3>
									<ul style="list-style: none; display: inline-flex; font-size: 30px;">
										<li> <a class="fa fa-facebook" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-twitter" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-google-plus" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-instagram" target="_blank" href="#"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div><br><br>
		
		<?php 

	//footer
	include 'footer.php';

	?>



</body>
		
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/notifications.js"> </script>
		<script type="text/javascript" src="js/validator.min.js"></script>
		<script type="text/javascript" src="js/form-scripts.js"></script>
</html>