<?php 

    //include'dbconfig.php';
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
    
    $farmer_search = new FARMER();

    $_SESSION['$query'] = $_GET['search']; 
    $query = $_SESSION['$query'];
    // gets value sent over search form
    //code taken to search view.php  tp be loaded by js
    $results = $farmer_search->runQuery( "SELECT COUNT(*) FROM farmer_posts
            WHERE (`title` LIKE '%$query%') OR (`price` LIKE '%$query%') OR (`description` LIKE '%$query%') OR(`cartegory` LIKE '%$query%') OR(`phone` LIKE '%$query%') OR(`email` LIKE '%$query%') OR(`location` LIKE '%$query%')") ;
        $results->bindValue(1, "%$query%", PDO::PARAM_STR);
    $results->execute();
    $get_total_rows = $results->fetch();
$item_per_page = 5;
//breaking total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);
        

$farmer_home = new FARMER();

// if(!$farmer_home->is_logged_in())
// {
//  $farmer_home->redirect('index.php');
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
    <br style="margin: 30px;">
  </div>
   <div class="clearfix"></div>
   <?php 

    if (isset($_POST['btn-search'])) {
      $item = $_POST["search"];
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

    <div class="container" id="search_view">
      <!-- serch viwed here from js -->

    </div>
    <div class=" col-md-6 col-md-offset-3 paging_link"></div>
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
    <!-- <script type="text/javascript" src="js/jquery.validate.min.js" ></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="js/register.js"></script> -->
    <script type="text/javascript" src="js/script.js"></script>
     <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#search_view").load("search_view.php");  //initial page number to load
      $(".paging_link").bootpag({
         total: <?php echo $pages; ?>
      }).on("page", function(e, num){
        e.preventDefault();
        //$("#results").prepend('<div class="loading"><img src="ajax-loader.gif" /> Loading...</div>');
        $("#search_view").load("search_view.php", {'page':num});
      });

    });
    </script>
    


</html>


 