<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['delete']) {
		
		require_once 'class.admin.php';
		 $admin_delete = new ADMIN();
		

		$pid = intval($_POST['delete']);

		

		// $stmt = $admin_delete->runQuery("DELETE FROM farmer_posts WHERE ID=:pid");
		// $stmt->execute(array(':pid'=>$pid));
		
		if ($admin_delete->delete_post($pid)) {
			$response['status']  = 'success';
			$response['message'] = 'News Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete product ...';
		}
		echo json_encode($response);
		//$stmt_select = $DB_con->query("SELECT new_photo FROM asawa_new WHERE new_id='$pid'");
		// //$stmt_select->execute(array(':pid'=>$pid));
		// $imgRow=$stmt_select->fetch_array();
  //         	if($imgRow['new_photo'] != '')
  //        {
		// unlink("new_images/".$imgRow['new_photo']); 
		// 	}
	}