<?php
 session_start();
require_once 'class.admin.php';

$register_consultant = new ADMIN();




if(isset($_POST['btn-register']))
{
	
	$email = trim($_POST['email']);
	$upass = trim($_POST['password']);
	// $code = md5(uniqid(rand()));
	
	$stmt = $register_consultant->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email already exists!
				</div>";
	}
	else
	{
		if($register_consultant->register_consultant($email,$upass))
		{			
			$msg = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Accout Registered
				</div>";
		}
		else
		{
			$$msg = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' >
						<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error While registering
				</div>";
		}		
	}
}
?>