<?php
session_start();
require_once 'class.admin.php';
$farmer_home = new ADMIN();

	$hide_id = trim($_POST['id']);
	$hide = 1; 
	$show = 0;
	

	$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE ID=:email_id AND hidden= 1");
	$stmt->execute(array(":email_id"=>$hide_id));
	$list = $stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount()==0){
		$farmer_home->block_user($hide_id,$hide);
		echo "hidden";
		}
		else {
			
			$farmer_home->block_user($hide_id,$show);
			echo "show";
		}
//}
?>