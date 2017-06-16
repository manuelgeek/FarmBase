<?php
session_start();
  include_once 'class.admin.php';
  $admin_view = new ADMIN();

  if(!$admin_view->is_logged_in())
{
  $admin_view->redirect('index');
}

$stmt = $admin_view->runQuery("SELECT * FROM tbl_admin WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Admin | Print Product Posts</title>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>
    <link rel="stylesheet" href="../css/sweetalert2.min.css" type="text/css" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="#SSS" rel="stylesheet" type="text/css" />
     <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="../font/css/font-awesome.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="../js/jquery2.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">

      function cwRating(id){
        $.ajax({
          type:'POST',
          url:'block_user.php',
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



    <div class="clearfix"></div>
     <div class="col-lg-2 col-lg-offset-5">
    <a href="" onclick="print()"><i class="glyphicon glyphicon-print"></i></a>
    <br style="margin: 0px;">
  </div>
  <div class="col-md-8 col-md-offset-2 text-center" style="color:#00796b;">
      <img src="../img/icon-192.png" class="img-responsive center-block" width=90px>
    <h2>FarmBase Farmer Posts</h2><hr>
  </div>
                                
   <div class="div">
   <table id="table_view"></table>
   </div>                             
         
                    
<script type="text/javascript" src="../js/datatables.min.js"></script>
<script src="../js/sweetalert2.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() 
{
	loadtable();
});
function loadtable() { var tabler = $('#table_view').dataTable( {
        "aaData": [
        <?php 
        $stmt = $admin_view->runQuery("SELECT * FROM farmer_posts  ORDER BY ID DESC ");
        $stmt->execute();
         while ($comm = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($comm);
                        ?>

      ["<?php echo $ID; ?>","<?php echo $title; ?>","<?php echo $email; ?>","<?php echo $location; ?>","<?php echo $price; ?>","<?php echo date('M j, Y',strtotime($timer)); ?>"],
      <?php }  ?>
      ],
        "columns": [
            { "title": "ID" },
            { "title": "Product Title" },
            { "title": "Posted By" },
            { "title": "Location" },
            { "title": "Price" },
            { "title": "Posted At" }
        ]
    }); 
    }  

</script>
        
<script type="text/javascript">
	 $('#table_view')
	.addClass('table table-bordered table-striped');
</script>


 <h4><a href="home">FarmBase</a></h4>
 <hr>
 <div class="text-center ">
        <p>&copy; &nbsp;<?php echo date('M j, Y'); ?> &nbsp;All Rights Reserved </p>
 </div>
</body>
</html>