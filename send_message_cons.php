<?php
session_start();
include 'class.farmer.php';
$send_message = new FARMER();
if($_POST)
	{
		$name = $_POST['name'];
		$senderEmail = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$postID =  $_SESSION['$var'];

		$stmt = $send_message->runQuery("SELECT * FROM message_posts WHERE ID=:email_id");
		$stmt->execute(array(":email_id"=> $postID));
		$row = $stmt->fetch(PDO::FETCH_ASSOC); 

		$receiverEmail = $row['email'];


			if($send_message->send_message_cons($name,$senderEmail,$phone,$message,$postID,$receiverEmail))
			{
				echo "Message Successfully Sent to $receiverEmail ";
			}
			else{
				echo "Failed to send, try again";
			}	

	}
?>