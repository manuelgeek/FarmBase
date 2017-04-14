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
<title>Admin | View Posts</title>

<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>
    <link rel="stylesheet" href="../css/sweetalert2.min.css" type="text/css" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="#SSS" rel="stylesheet" type="text/css" />
     <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="../font/css/font-awesome.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>

</head>
   
<body>
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
            <li ><a href="home">Home</a></li>
            <li class="active"><a href="view_posts">Viw Products</a></li>
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

                                
   <div class="container">
   <table id="table_view"></table>
   </div>                             
         
                    
<script type="text/javascript" src="../js/jquery2.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
      ["<?php echo $ID; ?>","<?php echo $title; ?>","<?php echo $email; ?>","<?php echo $location; ?>","<a class='btn btn-sm btn-danger' id='delete_product' data-id='<?php echo $ID; ?>' href='javascript:void(0)'><i class='glyphicon glyphicon-trash'></i></a>"],
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
            url: 'delete.php',
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

 <h4><a href="home">Back to Panel</a></h4>
 <footer>
      <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3 text-center">
          <p>&copy; &nbsp;<?php echo date('Y'); ?> &nbsp;All Rights Reserved </p>
        </div>
        
      </div>
    </footer>
</body>
</html>