<?php
session_start();
require_once 'class.consultant.php';
$consult_home = new CONSULTANT();

if(!$consult_home->is_logged_in())
{
	$consult_home->redirect('index.php');
}

$stmt = $consult_home->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['consultantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['photo']=="") {
  $pic = "<img class='img-circle ' src='../img/user.png' style='' height=50px width=50px />";
}
?>
<?php
  // error_reporting( ~E_NOTICE ); // avoid notice

if(isset($_POST['btn-post']))
{
  $title = trim($_POST['title']);
  
  $description = trim($_POST['description']);
  $cartegory = trim($_POST['cartegory']);
  
  $phone = $row['phone'];
  $email = $row['name'];
  $piced = $row['photo'];

  $imgFile = $_FILES['photo']['name'];
    $tmp_dir = $_FILES['photo']['tmp_name'];
    $imgSize = $_FILES['photo']['size'];


    if(empty($imgFile)){
      $userpic = '';
        }
        
         else{
          $upload_dir = 'message_images/'; // upload directory
      
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
            if($consult_home->consultant_post($title,$phone,$description,$cartegory,$userpic,$email,$piced))
          {
            $msg1 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
                  <button class='close ' data-dismiss='alert'>&times;</button>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Message successfully Posted
                  </div>";
          }
          else{
            $msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
                  <button class='close ' data-dismiss='alert'>&times;</button>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while posting!
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
		 <link href="../css/style.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="../font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
     <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	
		<title>Consultant | Post</title>
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
          <a class="navbar-brand" href="../index">Farmers</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home">Home</a></li>
            <li><a href="../blog">Blog</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <li><a href="../about">About Farmbase</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
       <li id="header_inbox" class="dropdown">
               <!-- messages in inbox here -->         
  </li>
                    <!-- inbox dropdown end -->
      <li class="active"><a href="home"><span class="glyphicon glyphicon"></span>&nbsp;Post Message</a></li>   
	 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php
          if(isset($pic)){
            echo $pic;
          } else { ?>                 

          <img class="img-circle " src="consult_images/<?php echo $row['photo']; ?>"  style=" padding:0px;"  height=50px />
        <?php
        }?>
			  <span class=""></span>&nbsp; <?php echo $row['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
              
                 <li><a href="consultant_profile"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit Profile</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
   
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>
   	 <div class="col-lg-2 col-lg-offset-5">
		<br style="margin: 30px;">
	</div>
 <section>
      <div class="container" id="post_body">

            <div class=" col-md-8 col-md-offset-2 row text-center">
              <h2 class="title ">Consultant  Posts</h2>
              <p> Make your posts messages below</p>
            </div>
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
        <form method="post" enctype="multipart/form-data">
              <div class="form-group col-md-8 col-md-offset-2">
                <label class="login-field-icon fui-user" for="login-name">Name of Post </label>
                <input type="text" name="title" class="form-control login-field" value="" placeholder="Name of Post" id="login-name" required />
                
              </div>

              <div class="form-group col-md-8 col-md-offset-2">
              <label class="login-field-icon fui-lock" for="login-pass">Description(body).... </label>
                <textarea type="text" name="description" class="form-control login-field" value="" placeholder="Description..." id="login-pass" required > </textarea>
                 <script>
                    CKEDITOR.replace( 'description' );
                </script>
                
              </div>
              <div class="form-group col-md-8 col-md-offset-2">
                <label class="login-field-icon fui-lock" for="login-pass">Cartegory</label>
                <select class="form-control" name="cartegory" required>
                   <option value="">Select Cartegory...</option>
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
              <div class="form-group col-md-8 col-md-offset-2">

              <label class="control-label">Product Img.</label>
                   <input class="input-group form-control" type="file" name="photo" accept="image/*"  />
                   </div>
              <div class="form-group col-md-8 col-md-offset-2">
              <input class="btn btn-primary  btn-block" value="Post Message" name="btn-post" type="submit"/><br>
              
              </div>
        </form>
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


</section>
</body>
    <script type="text/javascript" src="../js/jquery2.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
   
    <script type="text/javascript" src="../js/validation.min.js"></script>
    <script type="text/javascript" src="../js/register.js"></script>
    <script type="text/javascript" src="../js/notifications.js"> </script>
</html>