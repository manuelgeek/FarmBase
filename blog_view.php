<?php

 error_reporting( ~E_NOTICE ); // avoid notice
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
// if (isset($_POST['btn-fav'])) {
// 	$fav_mess = trim($_POST['btn-fav']);
// 	$email = $row['email'] ;
// 	$favourite = 1; 
// 	$fav_no = 0;

// 	$stmt = $farmer_home->runQuery("SELECT * FROM message_fav WHERE postID=:email_id AND email='$row[email]'");
// 	$stmt->execute(array(":email_id"=>$fav_mess));
// 	//$list = $stmt->fetch(PDO::FETCH_ASSOC);
// 	if($stmt->rowCount()==0){
// 		$farmer_home->farmer_fav($fav_mess,$email,$favourite);
					

// }
// }

?>
<?php
				        $_SESSION['$var'] = $_GET['page'];
							 $stmt = $admin_home->runQuery("SELECT * FROM message_posts WHERE ID=:email_id");
								$stmt->execute(array(":email_id"=> $_SESSION['$var']));
								$message = $stmt->fetch(PDO::FETCH_ASSOC);  

								if ($stmt->rowCount() < 1) {
								    	header("Location: blog ");
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
	
		<title>Farmer | Blog View</title>
		<script type="text/javascript" src="js/jquery2.js"></script>
<script type="text/javascript">

function cwRating(id){
	$.ajax({
		type:'POST',
		url:'favourite.php',
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


	</head>
	<body">
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
            <li ><a href="blog">Blog</a></li>
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
                 <li><a href="message_favs"><span class="glyphicon glyphicon-user"></span>&nbsp;Favourites</a></li>
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
    <div class="container" id="panel_post">
    	 <div class="how-works-area col-md-12">
				
            <div class="how-works">
	            <!-- <div class="col-md-3 card">
	                <ul  class="nav  nav-tabs " id="myTab">
	                   <li  class="active"><a href="#feeds" data-toggle="tab">Feeds, Suppliments and Seeds</a></li>
	                  <li><a href="#tools" data-toggle="tab">Farm Machinery and Tools</a></li>
	                  <li><a href="#livestock" data-toggle="tab">Livestock, Poultry and Fish</a></li>
	                  <li><a href="#farm" data-toggle="tab">Farm Produce</a></li>
	                </ul>
	             </div> -->
                <!-- Tab panes -->
                <div class="tab-content  clearfix col-md-10 col-md-offset-1 ">
                  <div class="tab-pane fade in active" id="feeds">
                  		<?php
                  			//php codes taken to top
                  		?>
							<h2 class="h2">More on <?php echo $message['title']; ?></h2>
				        <div class='col-md-12 row-eq-height card'>
							
								<div class="col-md-5 col-sm-5">
					                <?php if ( $message['photo']==''){
					                 echo ""; 
					                }else {?>
					                	
					                	 <img  src="consultants/message_images/<?php echo $message['photo']; ?>" style="padding: 10px 0px;"  class="item_image img-responsive" />
					                	
							               <?php }
							               		
					                ?>
			               		</div>
			                <div class="col-md-7 col-sm-7 ">
			                	<div class="col-md-7">	
				                	<h6 class="itemed h6"><?php echo $message['cartegory']; ?></h6>
					                <h3 class="itemed h3"><b><?php echo $message['title']; ?></b></h3>
					                <h4 class="itemed h4 " style="font-style: italic;"><?php 
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
								   } ?></h4>
					                
								</div>
								<div class="col-md-5 col-sm-5 card ">
			            			<div class="col-md-12" style="padding:2px;" >
			            				<h3 class="h4"> Posted By</h3>
			            			</div>
			            			<div class="col-md-12 " style="padding:2px;">
				            			<div class="col-md-3">
				            			<?php
				            			 if ($message['userpic']=="") {
												$pic4 = "<img class='img-circle ' src='img/user.png' style='' padding:0px; height=50px width=50px />";
											}
				            			 ?>
				            				<?php
													if(isset($pic4)){
														echo $pic4;
													} else { ?>									

													<img class="img-circle " src="consultants/consult_images/<?php echo $message['userpic']; ?>"  style=" padding:0px;"  height=50px />
												<?php
												}?>
				            			</div>
				            			<div class="col-md-9">
				            				<p class="phoned"><?php echo $message['email']; ?></p>
				            				
					                		 
				            			</div>
			            			</div>
			            			<div class="col-md-12" style="padding:2px;">
				            			<button style="width: 200px; margin: 2px;" class="btn btn-sm btn-success" type="submit">Call</button><br>
				            			<button style="width: 200px; margin: 2px;" class="btn btn-sm btn-success" type="submit" data-toggle="modal" data-target="#messageForm">Message</button>
			            			</div>
			            		</div>
			               </div>
			               <div class="col-md-12 row">
			               		<div class="col-md-12 ">
			               			<span class="text"><?php echo $message['description']; ?></span>
					              
					               
					                 <span class="phoned"><span class=""> By:&nbsp; </span><b><?php echo $message['email']; ?></b>&nbsp;&nbsp;&nbsp;</span>
					                   <span  class="priced btn btn-default btn-xs"> <?php echo $message['phone']; ?></span>&nbsp;&nbsp;&nbsp;
					                   <span  class="priced btn btn-default btn-xs hidden-sm hidden-md hidden-lg"> Message</span>&nbsp;&nbsp;&nbsp;
					               <?php if($farmer_home->is_logged_in() OR $admin_home->is_logged_in() )  {
 								?>
					                <div style="float: right;">
					                	<!-- <form method="post" id="btn-message"> -->

										  <button name="btn-fav"  class="btn faver btn-default btn-sm" onClick="cwRating(<?php echo $message['ID']; ?>)" type="submit" value="<?php echo $message['ID']; ?>"><span>Favourite&nbsp;</span><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;</button>
										 <button name="btn-like" class="btn btn-default btn-sm" type="submit" value="<?php echo $message['ID']; ?>"> <span>Like&nbsp;</span><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;&nbsp;</button>
											<!-- <button name="btn-dis" class="btn btn-default btn-sm" type="submit" value="<?php //echo $message['ID']; ?>">< --><!-- span>Dislike&nbsp;</span><i class="glyphicon glyphicon-thumbs-down"></i>&nbsp;&nbsp;</button> -->
										 <!--  <span>Comment&nbsp;</span><i class="glyphicon glyphicon-comment"></i><br>  -->
										 <!-- </form> -->
									</div>
								<?php } ?>
			               		</div>
			               </div>
			               <!--   php comments removed -->
			               <div class="col-md-12 row">
			               		<h3 class="h3">Add Comment</h3>
			               </div>
			               <div class="col-md-10 col-md-offset-1">
			               	<?php if($farmer_home->is_logged_in() OR $admin_home->is_logged_in() )  {
 								?>
			               		<div class="col-md-10 col-md-offset-1">
			               			<form method="post" id="comment-form">
			               				<textarea name="comment" class="form-control" id="comment-box" required></textarea>
			               				<button type="submit" class="btn btn-primary btn-sm" id="btn-comment" onclick="comment();" name="btn-comment" >Comment</button>
			               			</form>
			               		</div>
			               		<?php } ?>
			               		<div class="col-md-12 row">
			               			<h4 class="h4">Comments</h4>
			               			<div class="col-md-12 row " id="read-comments">
			               			<!-- Comments display here...-->
			               			</div>
			               		</div>
			               </div>
			            </div>
				  		
				  		<div class="col-md-12  row-eq-height">
				  		<h2 class="h2">You may also like;</h2>
		                   <?php 
		                    $query = "SELECT * FROM message_posts WHERE cartegory = '$message[cartegory]' ORDER BY id DESC";       
		                    $records_per_page=2;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                 <!-- <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination"> -->
		                    <?php
		                   // $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    <!-- </ul>
		                 </div> -->
		                   </div>	
					
						  
                  </div>
                 
                  
                </div>
            </div>
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
															<textarea name="message" class="form-control input-sm" placeholder="Message..." required></textarea>
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


	<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
		<script type="text/javascript" src="js/comment.js"></script>
		<script type="text/javascript" src="js/send-message-cons.js"></script>
		<script type="text/javascript" src="js/notifications.js"> </script>

</html>