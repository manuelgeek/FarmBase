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
      $item = mysql_real_escape_string($_POST["search"]);
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
		<br style="margin: 15px;">
	</div>
	<div class="clearfix"></div>
   
    <div class="navbar navbar-inverse">
        
          <div class="nav navbar-nav navbar-right">
               <form action="" method="post">
               		<ul>
                    	<li>  <input type="text" class="form-control " name="search" placeholder="Search Products " id="country_id" onkeyup="autocomplet()"/></li>
                     
                     	<li> <button name="btn-search" class=" btn btn-success" type="submit"><i class="fa fa-search"></i></button></li>
                    </ul>
                </form>
            </div>
          
    </div>
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 pull-right "  id="sercher-view">
    	<ul id="country_list_id" class="card dropdown-menu "></ul>
    </div>

    <section>
    <div class="container" id="panel_post">
                <ul  class="nav  nav-tabs " id="myTab">
                   <li  class="active"><a href="#feeds" data-toggle="tab">Feeds, Suppliments and Seeds</a></li>
                  <li><a href="#tools" data-toggle="tab">Farm Machinery and Tools</a></li>
                  <li><a href="#livestock" data-toggle="tab">Livestock, Poultry and Fish</a></li>
                  <li><a href="#farm" data-toggle="tab">Farm Produce</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content  clearfix col-md-12  ">
                  <div class="tab-pane fade in active" id="feeds">
				  	 
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Feeds, Suppliments and Seeds' ORDER BY id DESC";       
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
                  <div class="tab-pane fade in" id="tools">
							
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Farm Machinery and Tools' ORDER BY id DESC";       
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
                  <div class="tab-pane fade " id="livestock">
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Livestock, Poultry and Fish' ORDER BY id DESC";       
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
                  <div class="tab-pane fade " id="farm">
						
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = 'Farm Produce' ORDER BY id DESC";       
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
	<footer>
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p>&copy; &nbsp;<?php echo date('Y'); ?> &nbsp;All Rights Reserved </p>
				</div>
				
			</div>
		</footer>
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