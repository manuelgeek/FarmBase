<?php
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
<?php //red more code
				        $_SESSION['$var-more'] = $_GET['var'];
							 $stmt = $admin_home->runQuery("SELECT * FROM farmer_posts WHERE ID=:email_id");
								$stmt->execute(array(":email_id"=> $_SESSION['$var-more']));
								$message = $stmt->fetch(PDO::FETCH_ASSOC);  

								if ($stmt->rowCount() < 1 ) {
								    	header("Location: index ");
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
		<script type="text/javascript" src="js/jquery2.js"></script>
		<!--   JS for FAvourites  -->
		<script type="text/javascript">

			function cwRating(id){
				$.ajax({
					type:'POST',
					url:'favourite_product.php',
					data:'id='+id,
					success:function(msg){
						if(msg == 'fav'){
							 $('.faver').removeClass('btn-default').addClass('btn-warning');
						}else{
							 $('.faver').removeClass('btn-warning').addClass('btn-default');
						}
					}
				});
				return false;
			}
		</script>
		<!-- favourite colouring -->
<?php
			$stmt = $farmer_home->runQuery("SELECT * FROM product_fav WHERE postID=:email_id AND email='$row[email]'");
			$stmt->execute(array(":email_id"=>$message['ID']));
			$list = $stmt->fetch(PDO::FETCH_ASSOC);
		?>
 		<script type="text/javascript">
 			$('document').ready(function()	{ 	
				if (<?php echo $list['favourite']; ?>==1) {
										
				 $('.faver').removeClass('btn-default').addClass('btn-warning');
				}else{
				 $('.faver').removeClass('btn-warning').addClass('btn-default');
				}
					});
		
		</script>
		
<style type="text/css">
#dis{
	display:none;
}
</style>
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
		<br style="margin: 15px;">
	</div>
	 <div class="clearfix"></div>
   <?php 

    if (isset($_POST['btn-search'])) {
      $item = $_POST["search"];
      header("Location: farmer_search.php?search=$item ");
    }
   ?>
    <div class="row">
   		<div class="container">
   			<div class="navbar navbar-inverse __search-margin-top">
        
               		<form action="" method="post">
						<div class="__form-button">
	                     	<button name="btn-search" class=" btn btn-success" type="submit"><i class="fa fa-search"></i></button>
						</div>
						<div class="__form-input">
	                    	 <input type="text" class="form-control" name="search" placeholder="Search Products " id="country_id" onkeyup="autocomplet()"/> 
						</div>
              		</form>          
    </div>
   		</div>
   </div>
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 pull-right "  id="sercher-view">
    	<ul id="country_list_id" class="card dropdown-menu " style="display: hidden;
margin-right: 142px;
width: 232px;"></ul>
    </div>

      
    <section style="padding-top:50px">
    <div class="container" id="panel_post">
    	 
					
						<!--Nimetoa class:card hapa -->
				        <div class='col-md-12 row-eq-height' id="post-view">
							
								<div class="col-md-3 col-sm-3">
					                <?php if ( $message['photo']==''){
					                 echo ""; 
					                }else {?>
					                	
					                	 <img  src="post_images/<?php echo $message['photo']; ?>" style="padding: 0px 0px;"  class="item_image img-responsive" /><br>
					                	
							               <?php }
							               		
					                ?>
			               		</div>
			                <div class="col-md-9 col-sm-9 col-xs-12 " style="padding: 0px!important;">
			                	<div class="col-md-8 col-sm-8 col-xs-12">
			                		<span class="label __label"><?php echo $message['cartegory']; ?></span>
					                <h3 class="itemed h3"><b><?php echo $message['title']; ?></b></h3> <span class="itemed h5"> <?php echo date('M j, Y',strtotime($message['timer'])); ?></span>
					                <span class="text"><?php echo $message['description']; ?></span>
					                <h4 class="itemed h4"><b><?php echo $message['price']; ?></b>(negotiable)</h4>
					                <h5 class="itemed h5">Location: <b><?php echo $message['location']; ?></b></h5>
					                 <span class="phoned"><b><?php echo $message['email']; ?></b>&nbsp;&nbsp;&nbsp;</span>

					                   <span  class="priced btn btn-success btn-xs"> <?php echo $message['phone']; ?></span>&nbsp;&nbsp;&nbsp;
					                   <span class="itemed h5 " style="font-style: italic; "><?php 
					                 date_default_timezone_set('Africa/Nairobi'); 
	                    			$timed = $message['timer'];

								   $timestamp = strtotime($timed);	
								   
								   $strTime = array("second", "minute", "hour", "day", "month", "year");
								   $length = array("60","60","24","30","12","10");

								   $currentTime = time();
								   if($currentTime >= $timestamp) {
										$diff     = time()- $timestamp;
										for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
										$diff = $diff / $length[$i];
										}
										$diff = round($diff);
										echo $diff . " " . $strTime[$i] . "(s) ago ";
								   } ?></span><br><br>
								    <div style="float: right;">
					              <?php if($farmer_home->is_logged_in() OR $admin_home->is_logged_in() )  {
					              	?>
									  <button name="btn-fav"  class="btn faver btn-default btn-sm" onClick="cwRating(<?php echo $message['ID']; ?>)" type="submit" value="<?php echo $message['ID']; ?>"><span>Favourite&nbsp;</span><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;</button>
							<?php } ?>
								
											<span id="likecount-post"></span>
									</div><div class="clearfix"></div>
								</div>
								<!-- Card class inaudhi -->
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="__card __author-card clearfix panel panel-success">
										<div class="panel-heading">
											<h3 class="h4 ad-posted">Add Posted By</h3>
										</div>
										<div class="panel-body">
											<div class="col-md-12 " style="padding:2px;">
											<!-- col-* classes nimezitoa -->
					            			<?php
					            			 if ($message['userpic']=="") {
													$pic2 = "<img class='img-circle ' src='img/user.png' style='' padding:0px; height=50px width=50px />";
												}
					            			 ?>
					            				<?php
														if(isset($pic2)){
															echo $pic2;
														} else { ?>									
														<div class="__image" style="background:url(farmer_images/<?php echo $message['userpic'];?>);background-size:cover;">
															
														</div>
													<?php
													}?>

					            			<div class="__author-details">
					            				<p class="phoned"><?php echo $message['email']; ?></p>
					            				<p class="itemed "> <?php echo $message['location']; ?></p>
						                		 
					            			</div>
			            					</div>
										</div>
			            				<div class="panel-footer">
			    
				            			<a href="tel:+254-<?php echo $message['phone']; ?>" style="width: 100%;" class="btn btn-sm btn-success __item-cta">Call</a><br>
				            			<button style="width: 100%;" class="btn btn-sm btn-success __item-cta" type="submit" data-toggle="modal" data-target="#messageForm"  >Message</button>

			            				</div>
								</div>
			            			
			            		</div>
			               </div><br>
			            </div>
			   
            </div>
            <div class="col-md-12  row-eq-height">
						<h2 class="h2 also-like">You may also like;</h2>
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = '$message[cartegory]' AND (hidden ='' OR hidden = 0) ORDER BY timer DESC";       
		                    $records_per_page=8;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <!-- <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination"> -->
		                    <?php
		                  //  $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                   <!--  </ul>
		                 </div> -->
		                   </div>	
					
           
    </section>
	<?php 

	//footer
	include 'footer.php';

	?>
	</body>


	<!--................message Pop Up..............-->
							
							 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"  class="modal fade" id="messageForm">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Send Message</h4>
										</div>
										<div class="modal-body">
											<div id="dis">
										    <!-- here message will be displayed -->
											</div>
											<form class="form-horizontal" method="post" id="mess-sendForm">
											<?php if($farmer_home->is_logged_in() OR $admin_home->is_logged_in() )  { ?>
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Full Name:</label>
													<div class="col-md-5">
														<input type="text" name="name" class="form-control input-sm" value="<?php echo $row['name']; ?>" readonly >
													</div>
												</div>	
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Email:</label>
													<div class="col-md-5">
														<input type="email" name="email" class="form-control input-sm" value="<?php echo $row['email']; ?>" readonly >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Phone No:</label>
													<div class="col-md-5">
													<?php if ($row['phone'] != '') { ?>
														<input type="text" name="phone" class="form-control input-sm" value="<?php echo $row['phone']; ?>" readonly > <?php } else { ?>
														<input type="text" name="phone" class="form-control input-sm" placeholder="Phone No" required >
													<?php } ?>
														
													</div>
												</div>	
											<?php } else { ?>
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Full Name:</label>
													<div class="col-md-5">
														<input type="text" name="name" class="form-control input-sm" placeholder="Full Names" required >
													</div>
												</div>	
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Email:</label>
													<div class="col-md-5">
														<input type="email" name="email" class="form-control input-sm" placeholder="Email" required >
													</div>
												</div>	
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1">Phone No:</label>
													<div class="col-md-5">
														<input type="text" name="phone" class="form-control input-sm" placeholder="Phone No" required >
													</div>
												</div>	
											<?php } ?>
													<div class="form-group ">
														<label class="col-md-4 col-md-offset-1">Message:</label>
														<div class="col-md-5">
															<textarea name="message" class="form-control input-sm" placeholder="Message..." required ></textarea>
														</div>
													</div>
												<div class="form-group">
													<div class="col-md-2 col-md-offset-8">
														<button type="submit" class="btn btn-success" name="btn-save" id="btn-save">
														<span class="glyphicon glyphicon-send"> </span> Send</button>
													</div>
												</div>	
											</form>
										</div>
										<div class="modal-footer">
										<p class="nnot">Create an <a href="farmer_signin">account </a> with us today</p>
										</div>
									</div>
								</div>
							</div>	
											
										
					   <!--........................end of message pop up..............-->



	
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
		 <script type="text/javascript" src="js/script.js"></script>
		 <!--   JS for sending Messages  -->
		<script type="text/javascript" src="js/send-message.js"></script>
		<script type="text/javascript" src="js/notifications.js"> </script>

		<script type="text/javascript">
			$(document).ready(function(){
             $("#likecount-post").load("likecount_post.php");
            setInterval(function(){
              $("#likecount-post").load("likecount_post.php")
            }, 1000);

        });
		</script>
		
</html>