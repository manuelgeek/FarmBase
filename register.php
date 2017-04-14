<?php
 session_start();
require_once 'class.farmer.php';

$reg_farmer = new FARMER();




if(isset($_POST['btn-register']))
{
	$uname = trim($_POST['full_name']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone_no']);
	$upass = trim($_POST['password']);
	// $code = md5(uniqid(rand()));
	
	$stmt = $reg_farmer->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
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
		if($reg_farmer->register($uname,$email,$phone,$upass))
		{			
			$msg = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2' data-dismiss='alert'>
					<button class='close ' data-dismiss='alert'>&times;</button>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Accout Registered
				</div>";
				$_SESSION['farmerSession'] = $email;
					header("Location: index");
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