<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_about = new FARMER();

// if(!$farmer_about->is_logged_in())
// {
// 	$farmer_about->redirect('index.php');
// }
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
            <li ><a href="index">Home</a></li>
            <li><a href="blog">Blog</a></li>
           <!--  <li><a href="#">Tenders</a></li> -->
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
                 <li><a href="message_favs"><span class="glyphicon glyphicon-user"></span>&nbsp;Favourites</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li><?php } ?>
         <?php if(!$farmer_about->is_logged_in() && !$admin_about->is_logged_in()) {
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
				<div class="col-md-12" id="home1">
					<div class="col-md-8 col-md-offset-2" >
						<div class="col-lg-2 col-lg-offset-5">
						    <br style="margin: 30px;">

					     </div>
						<h2> About Us</h2>
						<p> One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we're attempting to solve.
						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we're attempting to convey a way of structuring a solution in code form to others.<hr>
						</p><br><br>
					</div>
				</div>
				<div class="col-md-12" id="contact">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2>Contact Us</h2>
							<p> We value your eed back. Thank you for contacting us.</p><br><br>
						</div>
						<div class="col-md-12" >
							<div class="col-md-7">
								<form method="post">
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Name</Label>
										<input type="text" name="name" class="form-control" placeholder="Enter your Name" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Location</Label>
										<input type="text" name="location" class="form-control" placeholder="Enter your Location" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Message</Label>
										<textarea class="form-control" name="message" required> 
											
										</textarea>
									</div>
										<div class="col-md-8 col-md-offset-2"> 
											<div class="form-group col-md-6 ">
												<input type="reset" name"reset" class="btn btn-success" value="RESET" />
											</div>
											<div class="form-group col-md-6 ">
												<input type="submit" name"btn-submit" class="btn btn-primary" value="SEND" />
											</div>
										</div>
								</form>
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
		<script type="text/javascript" src="js/notifications.js"> </script>
</html>