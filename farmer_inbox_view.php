<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();

if(!$farmer_home->is_logged_in())
{
	$_SESSION['redirect_url'] = $_SERVER['PHP_SELF']; 
	$farmer_home->redirect('farmer_signin');
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
		include_once 'class.message.php';

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
				        $messg = $_GET['message'];
							 $stmt = $admin_home->runQuery("SELECT * FROM sent_messages WHERE ID=:email_id");
								$stmt->execute(array(":email_id"=> $messg));
								$message = $stmt->fetch(PDO::FETCH_ASSOC);  
								if ($message['status']=='' || $message['status']=='unread') {
									
								$unread = 'read';
								$farmer_home->farmer_read_message($unread,$messg);
								
							}

								if ($stmt->rowCount() < 1) {
								    	header("Location: farmer_inbox ");
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
	
		<title>Farmer | Messages</title>
  
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

          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
     <div class="clearfix"></div>
   	 <div class="col-lg-2 col-lg-offset-5">
		<br style="margin: 15px;">
	</div>
	<div class="clearfix"></div>
   
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 pull-right "  id="sercher-view">
    	<ul id="country_list_id" class="card dropdown-menu "></ul>
    </div>

    <section>
    <div class="container" id="panel_post">
    		<div class='col-md-12 row-eq-height'>
    			<div class="col-md-3 col-sm-3">
					                <?php 
					        $stmt1 = $admin_home->runQuery("SELECT * FROM farmer_posts WHERE ID=:email_id");
                            $stmt1->execute(array(":email_id"=>$message['postID']));
                            $rowered = $stmt1->fetch(PDO::FETCH_ASSOC);
					                if ( $rowered['photo']==''){
					                 echo ""; 
					                }else {?>
					                	
					                	 <img  src="post_images/<?php echo $rowered['photo']; ?>" style="padding: 10px 0px;"  class="item_image img-responsive" />
					                	
							               <?php }
							               		
					                ?>
			               		</div>
			                <div class="col-md-9 col-sm-9 ">
			                	<div class="col-md-8 col-sm-8">	
				                	<h6 class="itemed h6"><?php echo $rowered['cartegory']; ?></h6>
					                <h3 class="itemed h3"><b><?php echo $rowered['title']; ?></b></h3>
					                <h4 class="itemed h4" style="font-style: italic;"><?php 
					                 date_default_timezone_set('Africa/Nairobi'); 
	                    			$timed = $rowered['timer'];

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
					               <span class="text">Message:<br><?php echo $message['message']; ?></span>
					                
								</div>
								<div class="col-md-4 col-sm-4 ">
			            			<div class="__card __author-card panel panel-default panel-success">
			            				<div class="panel-heading" style="" >
			            				<h3 class="h4 ad-posted"> Sent By</h3>
			            			</div>
			            			<div class="panel-body " style="padding:2px;">
				            			<div class="col-md-3">
				     	 <?php
                            $stmt1 = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE name=:email_id AND photo!=''");
                            $stmt1->execute(array(":email_id"=>$message['name']));
                            if ($stmt1->rowCount() > 0) {
                                $rower = $stmt1->fetch(PDO::FETCH_ASSOC);?>
                                <div class="__image" style="background: url(consultants/consult_images/<?php echo $rower['photo']; ?>);background-size:cover;"></div>
                       <?php     } else {
                            $stmt1 = $admin_home->runQuery("SELECT * FROM tbl_farmers WHERE name=:email_id AND photo!=''");
                            $stmt1->execute(array(":email_id"=>$message['name']));
                            if ($stmt1->rowCount() > 0) {
                                $rower = $stmt1->fetch(PDO::FETCH_ASSOC);?>
                                <div class="__image" style="background: url(farmer_images/<?php echo $rower['photo']; ?>);background-size:cover;"></div>
                      <?php } else { ?>
                                <div class="__image" style="background: url(img/user.png);background-size:cover;"></div>
                      <?php }
                        } ?>
				            			</div>
				            			<div class="__author-details">
				            				<p class="phoned"><?php echo $message['name']; ?></p>
				            				<p class="phoned"><?php echo $message['senderEmail']; ?></p>
				            				<p class="phoned"><?php echo $message['phone']; ?></p>
				            				
					                		 
				            			</div>
			            			</div>
			            			<div class="panel-footer" style="">
				            			<button style="width:100%;" class="btn btn-sm btn-success __item-cta" type="submit">Call</button><br>
				            			<!-- <button style="width: 200px; margin: 2px;" class="btn btn-sm btn-success" type="submit" data-toggle="modal" data-target="#messageForm">Message</button> -->
			            			</div>
			            			</div>
			            		</div>
			               </div>
			               
			        </div>
               
                <!-- Tab panes -->
						<div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
                			<h3 class="h3">More Messages</h3>
						</div>
		                   <?php 
		                   $namer = $row['name'];
		                    $query = "SELECT * FROM sent_messages WHERE receiverEmail='$namer' ORDER BY ID DESC";       
		                    $records_per_page=10;
		                    $newquery = $paginate->paging($query,$records_per_page);
		                    $paginate->dataview($newquery);
		                    ?>
		                  <div class="clearfix"></div>
		                 <div class=" col-md-10 col-xs-12 col-md-offset-1">
		                 	<ul class="pagination">
		                    <?php
		                    $paginate->paginglink($query,$records_per_page);        
		                    ?>
		                    </ul>
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