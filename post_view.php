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
							 $(element).closest('.faver').removeClass('btn-default').addClass('btn-primary');
						}else{
							 $(element).closest('.faver').removeClass('btn-primary').addClass('btn-default');
						}
					}
				});
				return false;
			}
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
      $item = mysql_real_escape_string($_POST["search"]);
      header("Location: farmer_search.php?search=$item ");
    }
   ?>
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
    	 
					<div class="container">
				        <div class='col-md-12 row-eq-height card' id="post-view">
							
								<div class="col-md-3 col-sm-3">
					                <?php if ( $message['photo']==''){
					                 echo ""; 
					                }else {?>
					                	
					                	 <img  src="post_images/<?php echo $message['photo']; ?>" style="padding: 0px 0px;"  class="item_image img-responsive" />
					                	
							               <?php }
							               		
					                ?>
			               		</div>
			                <div class="col-md-9 col-sm-9 ">
			                	<div class="col-md-8">	
				                	<h6 class="itemed h6"><?php echo $message['cartegory']; ?></h6>
					                <h3 class="itemed h3"><b><?php echo $message['title']; ?></b></h3>
					                <span class="text"><?php echo $message['description']; ?></span>
					                <h4 class="itemed h4"><b><?php echo $message['price']; ?></b>(negotiable)</h4>
					                <h5 class="itemed h5">Location: <b><?php echo $message['location']; ?></b></h5>
					                 <span class="phoned"><b><?php echo $message['email']; ?></b>&nbsp;&nbsp;&nbsp;</span>
					                   <span  class="priced btn btn-success btn-xs"> <?php echo $message['phone']; ?></span>&nbsp;&nbsp;&nbsp;
					                   <span class="itemed h5 " style="font-style: italic; "><?php 
					                date_default_timezone_set('Africa/Nairobi');
					                		$timestamp1 = $message['timer'];
					                		//$today = date("Y-m-d H:i:s");
					                		$passed1 = time() - strtotime($timestamp1);
					                		$days1 = floor($passed1 / 86400);
					                		$passed1 %= 86400;
					                		$hours1 = floor($passed1 / 3600);
					                		$passed1 %= 3600;
					                		$minutes1 = floor($passed1 / 60);
					                		if ($days1>=1) {
					                			echo $hours1;    
					                		?>&nbsp;Days&nbsp;<?php
					                		}
					                		if($hours1>=1){
					                		echo $hours1;    
					                		?>&nbsp;Hrs&nbsp;<?php
					                			}
					              		 	echo $minutes1; ?>mins ago</span>
					              <?php if($farmer_home->is_logged_in() OR $admin_home->is_logged_in() )  {
 								?>
					                <div style="float: right;">
									  <button name="btn-fav"  class="btn faver btn-default btn-sm" onClick="cwRating(<?php echo $message['ID']; ?>)" type="submit" value="<?php echo $message['ID']; ?>"><span>Favourite&nbsp;</span><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;</button>
									 <!--  <span>Comment&nbsp;</span><i class="glyphicon glyphicon-comment"></i><br> -->
									</div>
							<?php } ?>
								</div>
								<div class="col-md-4 card">
			            			<div class="col-md-12" style="padding:2px;" >
			            				<h3 class="h4 ad-posted">Add Posted By</h3>
			            			</div>
			            			<div class="col-md-12 " style="padding:2px;">
				            			<div class="col-md-3 col-sm-4 col-xs-4">
				            			<?php
				            			 if ($message['userpic']=="") {
												$pic2 = "<img class='img-circle ' src='img/user.png' style='' padding:0px; height=50px width=50px />";
											}
				            			 ?>
				            				<?php
													if(isset($pic2)){
														echo $pic2;
													} else { ?>									

													<img class="img-circle " src="farmer_images/<?php echo $message['userpic']; ?>"  style=" padding:0px;"  height=50px />
												<?php
												}?>
				            			</div>
				            			<div class="col-md-9 col-sm-8 col-xs-8">
				            				<p class="phoned"><?php echo $message['email']; ?></p>
				            				<p class="itemed "> <?php echo $message['location']; ?></p>
					                		 
				            			</div>
			            			</div>
			            			<div class="col-md-12" style="padding:2px;">
				            			<button style="width: 200px; margin: 2px;" class="btn btn-sm btn-success" type="submit" >Call</button><br>
				            			<button style="width: 200px; margin: 2px;" class="btn btn-sm btn-success" type="submit" data-toggle="modal" data-target="#messageForm"  >Message</button>
			            			</div>
			            		</div>
			               </div><br>
			            </div>
			         </div>
					
				            
						<div class="col-md-12  row-eq-height">
						<h2 class="h2 also-like">You may also like;</h2>
		                   <?php 
		                    $query = "SELECT * FROM farmer_posts WHERE cartegory = '$message[cartegory]' ORDER BY id DESC";       
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
		
</html>