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
		<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    	<link rel="stylesheet" href="css/sweetalert2.min.css" type="text/css" />

		 <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet"></link> -->
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
		<!-- <link rel="stylesheet" href="css/materialize/css/materialize.min.css"> -->
		<link rel="stylesheet" href="css/material-inputs.css">
		<title>Farmer | Manage Posts</title>
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/notifications.js"> </script>	
    <script type="text/javascript">

      function cwRating(id){
        $.ajax({
          type:'POST',
          url:'hide_post.php',
          data:'id='+id,
          success:function(msg){
            if(msg == 'hidden'){
               $('.faver'+id).removeClass('btn-warning').addClass('btn-success');
               $('.check'+id).removeClass('y').addClass('glyphicon-check');
            }else{
               $('.faver'+id).removeClass('btn-success').addClass('btn-warning');
               $('.check'+id).removeClass('glyphicon-check').addClass('y');
            }
          }
        });
        return false;
      }
      </script>

    
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
           		<p> Manage your posts below</p>
           		<span class="h3">Make your posts<a href="farmer_post" class="btn btn-default">Here...</a></span>
           	</div><br>
          <!-- //posts here by farmer -->
           <div class="container">
			   <table id="table_view"></table>
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
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() 
{
	loadtable();
});
function loadtable() { var tabler = $('#table_view').dataTable( {
        "aaData": [
        <?php 
        $stmt = $farmer_post->runQuery("SELECT * FROM farmer_posts WHERE userID= '$row[ID]' ORDER BY ID DESC ");
        $stmt->execute();
         while ($comm = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($comm);
                        ?>

      ["<?php echo $ID; ?>","<?php echo $title; ?>","<?php echo $email; ?>","<?php echo $location; ?>","<a class='btn btn-sm btn-danger' id='delete_product' data-id='<?php echo $ID; ?>' href='javascript:void(0)'><i class='glyphicon glyphicon-trash'></i></a> &nbsp; <span><a href='edit_post?edit=<?php echo $ID; ?>' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-edit'></i></a></span>&nbsp; &nbsp;<span><button name='btn-fav'  class='btn faver<?php echo $ID; ?> btn-warning btn-sm' onClick='cwRating(<?php echo $ID; ?>)' type='submit' value='<?php echo $ID; ?>'><span>Hide&nbsp;<i class='check<?php echo $ID; ?> glyphicon y'></span></button></span>"],
      <?php }  ?>
      ],
        "columns": [
            { "title": "ID" },
            { "title": "Product Title" },
            { "title": "Posted By" },
            { "title": "Location" },
            { "title": "Action" }
        ]
    }); 
    }  

</script>
        
<script type="text/javascript">
	 $('#table_view')
	.addClass('table table-bordered table-striped');
</script>
<script>
  $(document).ready(function(){
   
    
    $(document).on('click', '#delete_product', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Are you sure?',
      text: "It will be deleted permanently!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'post_delete.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
            tabler.ajax.reload();
            //loadtable();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  
 
  
</script>

		     <script>
     	$(document).ready(function() {
    $('select').material_select();
  });
     </script>
      
</html>