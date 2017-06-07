<?php

 error_reporting( ~E_NOTICE ); // avoid notice
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();

if(!$farmer_home->is_logged_in())
{
	$_SESSION['redirect_url'] = $_SERVER['PHP_SELF']; 
}

if($farmer_home->is_logged_in()){
$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['photo']=="") {
	$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px width=50px />";
}
}
$farmer_home_post = new Database();

if($farmer_home_post->dbConnection())
	{
		include_once 'class.blog.php';

		$paginate = new paginate();
	}

	$admin_home = new CONSULTANT();

	if($admin_home->is_logged_in()){
	$stmt = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
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
		 <link rel="stylesheet" href="css/material-inputs.css">
	
		<title>Farmer | Home</title>
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
            <li  class="active"><a href="blog">Blog</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <li><a href="about">About Farmbase</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
           <?php
if($farmer_home->is_logged_in()) {
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
         <?php if(!$farmer_home->is_logged_in() AND !$admin_home->is_logged_in() )  {
 	?>

            	<li><a href="farmer_signin" title="login">Login</a></li>           <?php }
     ?>

 <?php
if($admin_home->is_logged_in() ) {
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
   	 <div class="col-lg-2 col-lg-offset-5">
		<br style="margin: 30px;">
	</div>
    <section>
    <div class="container row" id="panel_post">
    	 <div class="how-works-area col-md-12">
				
            <div class="how-works">
	            <div class="col-md-3 __nimetoa-card">
	                <div class="__category-filter">
	                	<ul  class="list-group" id="myTab">
	                   <li  class="active list-group-item"><a href="#feeds" data-toggle="tab">Feeds, Suppliments and Seeds</a></li>
	                  <li class="list-group-item"><a href="#tools" data-toggle="tab">Farm Machinery and Tools</a></li>
	                  <li class="list-group-item"><a href="#livestock" data-toggle="tab">Livestock, Poultry and Fish</a></li>
	                  <li class="list-group-item"><a href="#farm" data-toggle="tab">Farm Produce</a></li>
	                </ul>
	                </div>
	             </div>
                <!-- Tab panes -->
                <div class="tab-content  clearfix col-md-9 ">
                  <div class="tab-pane fade in active" id="feeds">
				  		
				  		<div class="col-md-12  row-eq-height">
		                   <?php 
		                    $query = "SELECT * FROM message_posts WHERE cartegory = 'Feeds, Suppliments and Seeds' ORDER BY timer DESC";       
		                    $records_per_page=6;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination">
		                    <?php
		                    $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    </ul>
		                 </div>
		                   </div>	
					
						  
                  </div>
                  <div class="tab-pane fade in" id="tools">
							
						<div class="col-md-12 row-eq-height">
		                   <?php 
		                    $query = "SELECT * FROM message_posts WHERE cartegory = 'Farm Machinery and Tools' ORDER BY timer DESC";       
		                    $records_per_page=6;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination">
		                    <?php
		                    $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    </ul>
		                 </div>
		                   </div>
						
                  </div>
                  <div class="tab-pane fade " id="livestock">
						<div class="col-md-12 row-eq-height">
		                   <?php 
		                    $query = "SELECT * FROM message_posts WHERE cartegory = 'Livestock, Poultry and Fish' ORDER BY timer DESC";       
		                    $records_per_page=6;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination">
		                    <?php
		                    $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    </ul>
		                 </div>
		                   </div>
					
                  </div>
                  <div class="tab-pane fade " id="farm">
						<div class="col-md-12 row-eq-height">
		                   <?php 
		                    $query = "SELECT * FROM message_posts WHERE cartegory = 'Farm Produce' ORDER BY timer DESC";       
		                    $records_per_page=6;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination">
		                    <?php
		                    $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    </ul>
		                 </div>
		                   </div>

                  </div>
                  
                </div>
            </div>
           </div>
        </div>

       
    </section>
     <div class="clearfix"></div>
    <section>
			<div class="container" id="register">
			  <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Register</h2>
					<div class="line"></div>
				  </div>           
				  <p>In order for the Presbyterian Weavers members to access their accounts for the first time,follow the following simple steps. In case of any problems,our support team is always ready to help</p>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">How to Register</h2>
					<div class="line"></div>
				  </div>
				  <ul class="footer-service">
					<li><span class="fa fa-check"></span>Enter your Email address</li>
					<li><span class="fa fa-check"></span>Enter default password</li>
					<li><span class="fa fa-check"></span>Go to Change Password</li>
					<li><span class="fa fa-check"></span>Choose Passsword of Your Choice </li>
					<li><span class="fa fa-check"></span>Enjoy our services</li>
				  </ul>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Tags</h2>
					<div class="line"></div>
				  </div>
					<ul class="tag-nav">
					  <li><a href="home">Our Page</a></li>
					  <li><a href="php/logpage">Login</a></li>
					  <li><a href="about">Presbyterian Weavers</a></li>
					  <li><a href="https://www.facebook.com/Presbyterian-Weavers-of-Kenya-377229792412452/?hc_ref=SEARCH" target="_blank">FB</a></li>
					  <li><a href="presb.pdf" target="_blank">Constitution </a></li>
					  <li><a href="contact">Contact</a></li>
					</ul>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Contact Info</h2>
					<div class="line"></div>
				  </div>
				  <p>For more information about us you can get in touch with us.</p>
				  <address class="contact-info">
					<p><span class="fa fa-home"></span>P.O Box, 
					30784-00100, Nairobi</p>
					<p><span class="fa fa-phone"></span>+254728700535,+254716590576</p>
					<p><span class="fa fa-envelope"></span>info@presbyterianweavers.co.ke</p>
				  </address>
				  </div>
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
		<script type="text/javascript" src="js/notifications.js"> </script>
		
</html>