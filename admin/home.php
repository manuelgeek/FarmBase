<?php
 error_reporting( ~E_NOTICE ); 
session_start();
require_once 'class.admin.php';
$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
	$admin_home->redirect('index');
}

$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

include 'register.php';

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
	
		<title>Admin | Home</title>
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
          <a class="navbar-brand" href="#">FarmBase</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home">Home</a></li>
            <li><a href="view_posts">Viw Products</a></li>
            <!-- <li><a href="#">Tenders</a></li> -->
            <!-- <li><a href="about">About Farmbase</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
         
	 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

			  <span class=""></span>&nbsp; <?php echo $row['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
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
    <div class="container">
      <div class="col-md-12">
          <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h3>Basic info view</h3>
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                  <span class="li_heart"></span>
                  <h3>933</h3>
                        </div>
                  <p>933 People liked your page the last 24hs. Whoohoo!</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_cloud"></span>
                  <h3>+48</h3>
                        </div>
                  <p>48 New files were added in your cloud storage.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_stack"></span>
                  <h3>23</h3>
                        </div>
                  <p>You have 23 unread messages in your inbox.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                  <h3>+10</h3>
                        </div>
                  <p>More than 10 news were added in your reader.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3>OK!</h3>
                        </div>
                  <p>Your server is working perfectly. Relax & enjoy.</p>
                      </div>
                    
                    </div><!-- /row mt -->  
                  </div>
           </div>
        <div class="col-md-6 ">
          <h2 class="h2 text-center">Register a <small>Consultant</small></h2>
           <div class="col-md-6 col-md-offset-2 form-group" id="error1">
                  <!-- error will be shown here ! -->
                  </div>
          <?php if(isset($msg)) echo $msg;  ?>
           
          <form method="post" id="register-form">
            <div class="col-md-8 col-md-offset-2 form-group">
              <label>Email:</label>
              <input type="email" class="form-control login-field" name="email" placeholder="Enter  Email" id="login-email" required />
              <span class="help-block " id="error"></span>
            </div>
            <div class="col-md-8 col-md-offset-2 form-group">
              <label>Password:</label>
              <input type="password" class="form-control login-field" name="password" placeholder="Enter Password" id="password" required />
              <span class="help-block " id="error"></span>
            </div>
            <div class="col-md-8 col-md-offset-2 form-group">
              <label>Confirm Password:</label>
              <input type="password" class="form-control login-field" name="password_again" placeholder="Confirm  Password" id="login-pass" required />
              <span class="help-block " id="error"></span>
            </div>
            
            <div class="col-md-8 col-md-offset-2 form-group">
              <input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" id="btn-login" name="btn-register" value="Register"  />
            </div>
           
          </form>
        </div>
        <div class="col-md-6">
            <div class="row mt">
                <div class="col-md-6 col-sm-6 mb">
                          <div class="white-panel pn">
                            <div class="white-header">
                    <h5>TOP PRODUCT</h5>
                            </div>
                <div class="row">
                  <div class="col-sm-6 col-xs-6 goleft">
                    <p><i class="fa fa-heart"></i> 122</p>
                  </div>
                  <div class="col-sm-6 col-xs-6"></div>
                            </div>
                            <div class="centered">
                    <img src="assets/img/product.png" width="120">
                            </div>
                          </div>
                        </div><!-- /col-md-4 -->
                        
            <div class="col-md-6 col-sm-6 mb">
              <!-- WHITE PANEL - TOP USER -->
              <div class="white-panel pn">
                <div class="white-header">
                  <h5>TOP USER</h5>
                </div>
                <p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                <p><b>Zac Snider</b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">MEMBER SINCE</p>
                    <p>2012</p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">TOTAL SPEND</p>
                    <p>$ 47,60</p>
                  </div>
                </div>
              </div>
            </div><!-- /col-md-4 -->
                        

                    </div><!-- /row -->
            
        </div>
      </div>
    </div>
  </section>

</section>
</body>
    <script type="text/javascript" src="../js/jquery2.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
   
    <script type="text/javascript" src="../js/validation.min.js"></script>
    <script type="text/javascript" src="../js/register.js"></script>
</html>