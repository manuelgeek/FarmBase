<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();

// if(!$farmer_home->is_logged_in())
// {
// 	$farmer_home->redirect('index.php');
// }
if($farmer_home->is_logged_in()){

$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($row['hidden']==1) {
		$farmer_home->logout();	
		$farmer_home->redirect('farmer_signin');
	}

if ($row['photo']=="") {
	$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px width=50px />";
}
}
$farmer_home_post = new Database();

if($farmer_home_post->dbConnection())
	{
		include_once 'class.post.php';

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
<?php 

    if (isset($_POST['btn-search'])) {
      $item =$_POST["search"];
      header("Location: farmer_search.php?search=$item ");
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

		 <script async src="site.js"></script>
		  <script async src="offline.js"></script>

		 <link rel="manifest" href="manifest.json" />
	
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
          <a class="navbar-brand" href="index">FarmBase</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index">Home</a></li>
            <li><a href="blog">Blog</a></li>
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
                <li><a href="message_favs"><span class="glyphicon glyphicon-star"></span>&nbsp;Favourites</a></li>
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
		<br style="margin: 20px;">
	</div>

	</section>
	<header>
		  <section class="page1_header">
			<div class="container">
			  <div class="row">
			 <div class="col-md-7 col-sm-7" id="info1">
				<b> <h2>Farmers <br> Extension officers <br> The Market</h2>
				 <p> FarmBase <small>reaching out to all farmers</small> </p></b>
			</div>
			<div class="col-md-5 col-sm-5" id="tab-panels">
				<div class="col-md-6 col-sm-6 col-xs-6" id="we">
				<b>  <a href="blog" class="banner "><div class="maxheight">
					<i class="fa fa-globe"><br></i><p>Farm Blog</p></div>
				  </a></b>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6" id="wa">
				<b>  <a href="farmer_signup" class="banner "><div class="maxheight">
					<i class="fa fa-gears"><br></i><p>Register</p></div>
				  </a></b>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6" id="wa">
				 <b> <a href="index" class="banner "><div class="maxheight1">
					<i class="fa fa-lightbulb-o"><br></i><p>Farmer Products</p></div>
				  </a></b>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6" id="we">
				  <b> <a href="about" class="banner "><div class="maxheight1">
					<i class="fa fa-briefcase"><br></i><p>About Us</p></div>
				  </a></b>
				</div>
			</div>
				
			  </div>
			</div>
		  </section>
		
     
	<div class="clearfix"></div>
   <div class="row">
   		<div class="container">
   			<div class="navbar navbar-inverse __search-margin-top">
        
               		<form action="" method="post">
						<div class="__form-button">
	                     	<button name="btn-search" class=" btn btn-success" type="submit"><i class="fa fa-search"></i></button>
						</div>
						<div class="__form-input1">
	                    	 <input type="text" class="form-control" name="search" placeholder="Search Products " id="country_id" onkeyup="autocomplet()"  /> 
						</div>
              		</form>          
    </div>
   		</div>
   </div>
  </header>
  <div class="clearfix"></div>
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 pull-right "  id="sercher-view">
    	<ul id="country_list_id" class="card dropdown-menu " style="display:hidden;
			margin-right: 142px;
			width: 232px;"></ul>
    </div>


    <section>
    <div class="container" id="panel_post">
                <ul  class="nav  nav-tabs " id="myTab">
                   <li class="active"><a href="#farm" data-toggle="tab">Farm Produce</a></li>
                 
                  <li><a href="#livestock" data-toggle="tab">Livestock, Poultry and Fish</a></li>
                  
                  <li ><a href="#feeds" data-toggle="tab">Feeds, Suppliments and Seeds</a></li>
                   <li><a href="#tools" data-toggle="tab">Farm Machinery and Tools</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content  clearfix col-md-12  " style="padding: 0px!important;">
                  <div class="tab-pane fade " id="feeds" style="padding: 0px!important;">
				  	 
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Feeds, Suppliments and Seeds' AND (hidden ='' OR hidden = 0) ORDER BY timer DESC";       
		                    $records_per_page=12;
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
                  <div class="tab-pane fade in" id="tools" style="padding: 0px!important;">
							
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Farm Machinery and Tools' AND (hidden ='' OR hidden = 0) ORDER BY timer DESC";       
		                    $records_per_page=12;
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
                  <div class="tab-pane fade " id="livestock" style="padding: 0px!important;">
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Livestock, Poultry and Fish' AND (hidden ='' OR hidden = 0) ORDER BY timer DESC";       
		                    $records_per_page=12;
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
                  <div class="tab-pane fade in active" id="farm" style="padding: 0px!important;">
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Farm Produce' AND (hidden ='' OR hidden = 0) ORDER BY timer DESC";       
		                    $records_per_page=12;
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
    </section>
    <div class="clearfix"></div>
    <section>
			<div class="container" id="register">
			  <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Product Posts</h2>
					<div class="line"></div>
				  </div>           
				  <p>These are farm produce posts which are made by farmers. In you are a farmer or is intersted in farm products, you can proceed to create an account with us in order to access more services in FarmBase. Farmers can be messaged directly regarding their posts.<br>

				 <a href="farmer_signup">Create an account here.</a></p>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg"><a href="farmer_signup" style="color: #4CAF50!important;"> How to Register</a></h2>
					<div class="line"></div>
				  </div>
				  <ul class="footer-service">
					<li><span class="fa fa-check"></span>Enter your Personal Details</li>
					<li><span class="fa fa-check"></span>Enter default password</li>
					<li><span class="fa fa-check"></span>Read the Terms and Conditions</li>
					<li><span class="fa fa-check"></span>Accept to the terms of condition</li>
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
					  <li><a href="index">Posts</a></li>
					  <li><a href="farmer_signin">Login</a></li>
					  <li><a href="blog">The Blog</a></li>
					  <li><a href="about">About Us</a></li>
					  <li><a href="farmer_signup" >Register </a></li>
					  <li><a href="farmer_post">Create Posts</a></li>
					 
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
					<p><span class="fa fa-envelope"></span>info@farmbase.co.ke</p>
				  </address>
				  </div>
				</div>
			 </div>
			</div>
		</section>	
    <div class="clearfix"></div>
	<?php 

	//footer
	include 'footer.php';

	?>
	</body>
	 <script type="text/javascript" src="js/jquery2.js"></script>
    <script type="text/javascript" src="js/notifications.js"> </script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
		 <script type="text/javascript" src="js/script.js"></script>
</html>