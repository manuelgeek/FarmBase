<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();
$admin_home = new CONSULTANT();

if($admin_home->is_logged_in()){
	$stmt = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$_SESSION['consultantSession']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
if($farmer_home->is_logged_in()){
$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
								$stmt = $admin_home->runQuery("SELECT * FROM message_posts WHERE ID=:email_id");
								$stmt->execute(array(":email_id"=> $_SESSION['$var']));
								$message = $stmt->fetch(PDO::FETCH_ASSOC);  

			               
								$comment = trim($_POST['comment']);
								$id = $message['ID'];
								if ($comment !='') {
									
								
								if ($farmer_home->is_logged_in() OR $admin_home->is_logged_in()) {
									$email = $row['name'];
									$piced = $row['photo'];
								} else{
									$email = "Anonymous";
									$piced = "";
								}
									$farmer_home->comment_post($comment,$id,$email,$piced);
									echo "ok";
												
							}
			               ?>