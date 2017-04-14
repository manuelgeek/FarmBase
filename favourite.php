<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();

// if(!$farmer_home->is_logged_in())
// {
// 	$farmer_home->redirect('index.php');
// }
if($farmer_home->is_logged_in()){
$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

	$admin_home = new CONSULTANT();

	if($admin_home->is_logged_in()){
	$stmt = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$_SESSION['consultantSession']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	
}

//if (isset($_POST['btn-fav'])) {
	$fav_mess = trim($_POST['id']);
	$email = $row['email'] ;
	$favourite = 1; 
	$fav_no = 0;
	

	$stmt = $farmer_home->runQuery("SELECT * FROM message_fav WHERE postID=:email_id AND email='$row[email]'");
	$stmt->execute(array(":email_id"=>$fav_mess));
	$list = $stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount()==0){
		$farmer_home->message_fav($fav_mess,$email,$favourite);
		echo "fav";
		}
		else {
			if ($list['favourite']==1) {
				$farmer_home->message_favno($fav_mess,$email,$fav_no);
				echo "dis";
			}
			else {
				$farmer_home->message_favno($fav_mess,$email,$favourite);
				echo "fav";

			}
		}
//}
?>