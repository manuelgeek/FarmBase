<?php
session_start();
require_once 'class.farmer.php';
$farmer_post = new FARMER();

 if(!$farmer_post->is_logged_in())
{
 	$_SESSION['redirect_url'] = $_SERVER['PHP_SELF']; 
 	$farmer_post->redirect('farmer_signin');
 }

$stmt = $farmer_post->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['photo']=="") {
	$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px width=50px />";
}
?>
<?php
  // error_reporting( ~E_NOTICE ); // avoid notice

if(isset($_POST['btn-post']))
{
	$title = trim($_POST['title']);
	$price = trim($_POST['price']);
	$description = trim($_POST['description']);
	$cartegory = trim($_POST['cartegory']);
	$location = trim($_POST['location']);
	$phone = $row['phone'];
	$email = $row['name'];
	$piced = $row['photo'];
	$userID = $row['ID'];
	 $id = $_GET['edit'];


						if($farmer_post->farmer_edit_post($id,$title,$price,$phone,$location,$description,$cartegory,$email,$piced,$userID))
					{
						$msg1 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
									<button class='close ' data-dismiss='alert'>&times;</button>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Product Edited
									</div>";
					}
					else{
						$msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
									<button class='close ' data-dismiss='alert'>&times;</button>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while editing post!
								</div>";
					}
				

}
?>
<?php
				        $editer = $_GET['edit'];
							 $stmt = $farmer_post->runQuery("SELECT * FROM farmer_posts WHERE ID=:email_id");
								$stmt->execute(array(":email_id"=> $editer));
								$message = $stmt->fetch(PDO::FETCH_ASSOC);  

								if ($stmt->rowCount() < 1) {
								    	header("Location: manage_posts ");
								    }    
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!-- <link href="#SSS" rel="stylesheet" type="text/css" /> -->
		 <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		  <link href="css/parsley.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet"></link> -->
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
		<!-- <link rel="stylesheet" href="css/materialize/css/materialize.min.css"> -->
		<link rel="stylesheet" href="css/material-inputs.css">
		<title>Farmer | Edit Post</title>
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/notifications.js"> </script>	
     <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
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
            <li ><a href="index">Home</a></li>
            <li><a href="blog">Blog</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <li><a href="about">About Farmbase</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
           <?php
if($farmer_post->is_logged_in()) {
 	?>
 	<li id="header_inbox_bar" class="dropdown">
               <!-- messages in inbox here -->         
  </li>
                    <!-- inbox dropdown end -->
 	<li class="active"><a href="farmer_post"><span class="glyphicon glyphicon"></span>&nbsp;Post Produce Ad</a></li>
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
         <?php if(!$farmer_post->is_logged_in()) {
 	?>

            	<li><a href="farmer_signin" title="login">Login</a></li>           <?php }
     ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div><br><br><br>
    <section>
    	<div class="container" id="post_body">

           	<div class=" col-md-8 col-md-offset-2 row text-center">
           		<h2 class="title ">Farmer Posts</h2>
           		<p> Edit your post below</p>
           		<span class="h3">Manage your other posts<a href="manage_posts" class="btn btn-default">Here...</a></span>
           	</div><br>
           	<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
           		<?php
					if(isset($errMSG)){
				?>
		           <div class="alert alert-danger col-md-8 col-md-offset-2">
	            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
		            </div>
	            <?php
				}?>
				<?php
					if(isset($msg1)){
						echo $msg1;
				}
			?>	
								<div class="col-md-8 col-md-offset-2">
					                <?php if ( $message['photo']==''){
					                 echo ""; 
					                }else {?>
					                	
					                	 <img  src="post_images/<?php echo $message['photo']; ?>" style="padding: 10px 0px;"  class="item_image img-responsive" />
					                	
							               <?php }
							               		
					                ?>
			               		</div>
				<form method="post" enctype="multipart/form-data" data-parsley-validate >
	
							<div class="form-group col-md-8 col-md-offset-2">
								<label class="login-field-icon fui-user" for="login-name">Name of product </label>
							  <input type="text" name="title" class="form-control login-field" value="<?php echo $message['title']; ?>" placeholder="Name of Product" id="login-name" required />
							  
							</div>

							<div class="form-group col-md-8 col-md-offset-2">
							<label class="login-field-icon fui-lock" for="login-pass">Description.... </label>
							  <textarea type="text" name="description" class="form-control login-field" value="<?php echo $message['description']; ?>" placeholder="Description..." id="login-pass" required > </textarea>

							  <div id="trackingDiv"></div>
							  	<script>
							  		var config = {};
							  		config.value = '<?php echo $message['description']; ?>';
	                   				 CKEDITOR.replace( 'description' , config );
							  		
				                </script>
							  
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								 <label class="login-field-icon fui-lock" for="login-pass">Price</label>
							  <input type="text" name="price" class="form-control login-field" value="<?php echo $message['price']; ?>" placeholder="Price" id="login-pass" required data-parsley-type="integer" 	 />
							 
							</div>
							<div class="form-group col-md-8 col-md-offset-2">
								<label class="login-field-icon fui-lock" for="login-pass">Cartegory</label>
								<select class="browser-default select-dropdown" name="cartegory" required>
							     <option value="<?php echo $message['cartegory']; ?>"><?php echo $message['cartegory']; ?></option>
							        <option value="Feeds, Suppliments and Seeds">Feeds, Suppliments and Seeds</option>
							        <option value="Farm Machinery and Tools">Farm Machinery and Tools</option>
							        <option value="Livestock, Poultry and Fish">Livestock, Poultry and Fish</option>
							        <option value="Farm Produce">Farm Produce</option>
							       <!--  <option value="api">Apiculture</option>
							        <option value="aqua">Aquaculture</option>
							        <option value="flower">Floriculture</option>
							        <option value="veges">Vegetable</option>
							        <option value="spice">Spices</option> -->
							        <!-- <option value="serve">Services</option>
							        <option value="phone">Phones and Laptops</option> -->
							        
							        
							    </select>
							</div>
							
								<div class=" col-md-8 col-md-offset-2">
									 <label class="login-field-icon fui-lock " for="login-pass">Location</label>
								  <input type="text" name="location" class="placepicker form-control" value="<?php echo $message['location']; ?>" placeholder="Enter a Location" id="login-pass" required />
								 
								</div>

						
							<!-- <div class="form-group col-md-8 col-md-offset-2">

							<label class="control-label">Product Img.</label>
       						 <input class="input-group form-control" type="file" name="photo" accept="image/*" required />
       						 </div> -->
							<div class="form-group col-md-8 col-md-offset-2">
							<input class="btn btn-primary green  btn-block" value="Edit Post" name="btn-post" type="submit"/><br>
							
							</div>
				</form>
           	</div>
    		
    	</div>
    	
    </section>

	<?php 

	//footer
	include 'footer.php';

	?>
	</body>
	
		<script src="css/materialize/js/materialize.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
		<script src="js/parsley.min.js"></script>

		     <script>
     	$(document).ready(function() {
    $('select').material_select();
  });
     </script>
</html>