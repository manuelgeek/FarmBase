<?php
session_start();
require_once 'class.farmer.php';
$farmer_profile = new FARMER();

if(!$farmer_profile->is_logged_in())
{
	$farmer_profile->redirect('index');
}

$stmt = $farmer_profile->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['photo']=="") {
	$pic = "<img class='img-circle ' src='img/user.png' style='' height=50px width=50px />";
}
if ($row['photo']=="") {
  $pic1 = "<img class=' ' src='img/user.png' style='' height=170px />";
}
if(isset($_POST['btn-edit']))
{
  $phone = (trim($_POST['phone']));

    $imgFile = $_FILES['photo']['name'];
    $tmp_dir = $_FILES['photo']['tmp_name'];
    $imgSize = $_FILES['photo']['size'];

    if(empty($imgFile)){
      $userpic = $row['photo'];
        } else {


          $upload_dir = 'farmer_images/'; // upload directory
      
          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
          // valid image extensions
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
          // rename uploading image
          $userpic = rand(1000,1000000).".".$imgExt;
            
          // allow valid image file formats
          if(in_array($imgExt, $valid_extensions)){     
            // Check file size '5MB'
            if($imgSize < 5000000)        {
              move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
              $errMSG = "Sorry, your file is too large.";
            }
          }
          else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
          }
        }
          // if no error occured, continue ....
        if(!isset($errMSG))
        {
          if (!$row['photo']=="" && !empty($imgFile)) {
            unlink("farmer_images/".$row['photo']); 
            }

            if($farmer_profile->farmer_profile($phone,$userpic))
          {
            $msg1 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
                  <button class='close ' data-dismiss='alert'>&times;</button>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Profile Updated
                  </div>";

                  header("refresh:3; farmer_profile");
          }
          else{
            $msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
                  <button class='close ' data-dismiss='alert'>&times;</button>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while Updating!
                </div>";
          }
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
	
		<title>Farmer | Profile</title>
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
            <li><a href="#">Blog</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <li><a href="about">About Farmbase</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
           <?php
if($farmer_profile->is_logged_in()) {
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
                
                <li class="active"><a href="farmer_profile"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit Profile</a></li>
                 <li><a href="message_favs"><span class="glyphicon glyphicon-star"></span>&nbsp;Favourites</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li><?php } ?>
         <?php if(!$farmer_profile->is_logged_in()) {
 	?>

            	<li><a href="farmer_signin" title="login">Login</a></li>           <?php }
     ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>
   	 <div class="col-lg-2 col-lg-offset-5">
		    <br style="margin: 30px;">

	     </div>
      <div class="container">
          <div class="row">
            <div class=" col-md-8 col-md-offset-2 row text-center">
                <h2 class="title ">Personal Details</h2>
                <p> Edit your details below</p>
              </div>
              <div class="col-lg-2 col-lg-offset-5">
        <br style="margin: 30px;">

       </div>
          </div>
          <div class="col-md-10 col-md-offset-1">

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
            <form method="post" enctype="multipart/form-data">
                <div class="form-group col-md-8 col-md-offset-2">
                     <div class="input-group col-md-10 col-md-offset-1 ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user">&nbsp;</i>Name</span>
                        <input type="text" name="name" class="form-control " value="<?php echo $row['name']; ?>"  readonly />
                    </div>
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                     <div class="input-group col-md-10 col-md-offset-1 ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip">&nbsp;</i>Email</span>
                        <input type="email" name="email" class="form-control " value="<?php echo $row['email']; ?>"  readonly />
                    </div>
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                     <div class="input-group col-md-10 col-md-offset-1 ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone">&nbsp;</i>Phone</span>
                        <input type="text" name="phone" class="form-control " value="<?php echo $row['phone']; ?>"  required />
                    </div>
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                  <div class="col-md-4 col-sm-4  ">
                    <?php if(isset($pic1)){ echo $pic1; } else { ?> 
                      <img class=" " src="farmer_images/<?php echo $row['photo']; ?>"  style=" padding:0px;"  height=170px />
                    <?php } ?>
                  </div>
                  <div class="col-md-8 col-sm-8">
                     <div class="input-group col-md-10 col-md-offset-1 ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture">&nbsp;</i>Profile Photo</span>
                        <input type="file" name="photo" class="form-control " value="<?php echo $row['photo']; ?>" accept="image/*"  />
                    </div>
                      <p>Only GIF, JPG, PNG extensions  allowed</p>
                        <p> Do not use images larger than 5 Mbs </p>
                  </div>
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                  <div class=" col-md-10 col-md-offset-1 ">
                    <input class="btn btn-primary  btn-block" value="Edit Profile" name="btn-edit" type="submit"/><br>
                  </div>
               </div>
            </form>
          </div>
      </div>



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
    <script type="text/javascript" src="js/jquery.validate.min.js" ></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/notifications.js"> </script>
    
</html>