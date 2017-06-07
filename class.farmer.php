<?php

require_once 'dbconfig.php';

class FARMER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	
	public function register($uname,$email,$phone,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_farmers(name,email,phone,pass) 
			                                             VALUES(:user_name, :user_mail, :user_phone, :user_pass)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_phone",$phone);
			$stmt->bindparam(":user_pass",$password);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function reset_pass($email,$phone,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("UPDATE tbl_farmers SET pass = :user_pass WHERE 
				email=:user_email ");
			
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":user_email",$email);
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_farmers WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				
					if($userRow['pass']==md5($upass))
					{
						unset($_SESSION['consultantSession']);
						$_SESSION['farmerSession'] = $userRow['email'];
						return true;
					}
					else
					{
						header("Location: farmer_signin.php?error");
						exit;
					}
				
			}
			else
			{
				header("Location: farmer_signin.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['farmerSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['farmerSession'] = false;
	}
	
	public function delete_post($pid)
	{
		try
		{							
		$stmt = $this->conn->prepare("SELECT photo FROM farmer_posts WHERE ID=:pid");
		$stmt->execute(array(':pid'=>$pid));
		$imgRow=$stmt->fetch(PDO::FETCH_ASSOC);
		unlink("post_images/".$imgRow['photo']); 


		$stmt = $this->conn->prepare("DELETE FROM farmer_posts WHERE ID=:pid");
		$stmt->execute(array(':pid'=>$pid));
          
		
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function farmer_post($title,$price,$phone,$location,$description,$cartegory,$userpic,$email,$piced,$userID)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO farmer_posts(title,price,phone,location,description,cartegory,photo,email,userpic,userID) 
			                                             VALUES(:user_name, :user_mail, :user_phone, :user_loc, :user_desc, :user_cart, :user_pic, :user_email, :user_img, :userID)");
					$stmt->bindparam(":user_name",$title);
					$stmt->bindparam(":user_mail",$price);
					$stmt->bindparam(":user_phone",$phone);
					$stmt->bindparam(":user_loc",$location);
					$stmt->bindparam(":user_desc",$description);
					$stmt->bindparam(":user_cart",$cartegory);
					$stmt->bindparam(":user_pic",$userpic);
					$stmt->bindparam(":user_email",$email);
					$stmt->bindparam(":user_img",$piced);
					$stmt->bindparam(":userID",$userID);
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function farmer_edit_post($id,$title,$price,$phone,$location,$description,$cartegory,$email,$piced,$userID)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE farmer_posts SET title = :title, price= :price,  phone = :user_phone,
										location = :loc , description = :descript , cartegory = :cart , email = :email ,
										 userpic = :user_pic ,userID = :userID WHERE ID = :id ");
			$stmt->bindparam(":title",$title);
			$stmt->bindparam(":price",$price);
			$stmt->bindparam(":user_phone",$phone);
			$stmt->bindparam(":loc",$location);
			$stmt->bindparam(":descript",$description);
			$stmt->bindparam(":cart",$cartegory);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":user_pic",$piced);
			$stmt->bindparam(":userID",$userID);
			$stmt->bindparam(":id",$id);

			$stmt->execute();	
			return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}

	public function farmer_profile($phone,$userpic)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE tbl_farmers SET phone = :user_phone, photo = :user_pic WHERE email='$_SESSION[farmerSession]' ");
			$stmt->bindparam(":user_phone",$phone);
			$stmt->bindparam(":user_pic",$userpic);

			$stmt->execute();	
			return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}

	public function comment_post($comment,$id,$email,$piced)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO comment_posts(postID,comment,email,userpic) 
			                                             VALUES(:user_ID, :user_comment, :user_mail, :user_img)");
					$stmt->bindparam(":user_ID",$id);
					$stmt->bindparam(":user_comment",$comment);
					$stmt->bindparam(":user_mail",$email);
					$stmt->bindparam(":user_img",$piced);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function message_fav($fav_mess,$email,$favourite)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO message_fav(postID,email,favourite) 
			                                             VALUES(:user_ID, :user_mail, :user_fav)");
					$stmt->bindparam(":user_ID",$fav_mess);
					$stmt->bindparam(":user_mail",$email);
					$stmt->bindparam(":user_fav",$favourite);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function message_favno($fav_mess,$email,$fav_no)
	{
		try {
			 

					$stmt = $this->conn->prepare("UPDATE message_fav SET favourite =:user_fav WHERE email = '$email' AND postID = '$fav_mess' ");
					//$stmt->bindparam(":user_ID",$fav_mess);
					//$stmt->bindparam(":user_mail",$email);
					$stmt->bindparam(":user_fav",$fav_no);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function product_fav($fav_mess,$email,$favourite)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO product_fav(postID,email,favourite) 
			                                             VALUES(:user_ID, :user_mail, :user_fav)");
					$stmt->bindparam(":user_ID",$fav_mess);
					$stmt->bindparam(":user_mail",$email);
					$stmt->bindparam(":user_fav",$favourite);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function product_favno($fav_mess,$email,$fav_no)
	{
		try {
			 

					$stmt = $this->conn->prepare("UPDATE product_fav SET favourite =:user_fav WHERE email = '$email' AND postID = '$fav_mess' ");
					//$stmt->bindparam(":user_ID",$fav_mess);
					//$stmt->bindparam(":user_mail",$email);
					$stmt->bindparam(":user_fav",$fav_no);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function hide_post($hide_id,$hide)
	{
		try {
			 

					$stmt = $this->conn->prepare("UPDATE farmer_posts SET hidden =:user_hide WHERE ID = :hide_id");
			
					$stmt->bindparam(":user_hide",$hide);
					$stmt->bindparam(":hide_id",$hide_id);
					
					
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	

	public function send_message($name,$senderEmail,$phone,$message,$postID,$receiverEmail)
	{
		try{
			$status = 'unread';

			$stmt = $this->conn->prepare("INSERT INTO sent_messages(name,senderEmail,phone,message,postID,receiverEmail,status) VALUES(:name, :sender, :phone, :message, :post, :receive, :status)");
			$stmt->bindParam(":name", $name);
			$stmt->bindParam(":sender", $senderEmail);
			$stmt->bindParam(":phone", $phone);
			$stmt->bindParam(":message", $message);
			$stmt->bindParam(":post", $postID);
			$stmt->bindParam(":receive", $receiverEmail);
			$stmt->bindParam(":status", $status);

			$stmt->execute();	
			return $stmt;
			
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}

	public function send_message_cons($name,$senderEmail,$phone,$message,$postID,$receiverEmail)
	{
		try{
			$status = 'unread';

			$stmt = $this->conn->prepare("INSERT INTO sent_messages_cons(name,senderEmail,phone,message,postID,receiverEmail,status) VALUES(:name, :sender, :phone, :message, :post, :receive, :status)");
			$stmt->bindParam(":name", $name);
			$stmt->bindParam(":sender", $senderEmail);
			$stmt->bindParam(":phone", $phone);
			$stmt->bindParam(":message", $message);
			$stmt->bindParam(":post", $postID);
			$stmt->bindParam(":receive", $receiverEmail);
			$stmt->bindParam(":status", $status);

			$stmt->execute();	
			return $stmt;
			
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}

	public function farmer_read_message($unread,$messg)
	{
		try{

			$stmt = $this->conn->prepare("UPDATE sent_messages SET status = :user_pass WHERE 
									ID=:user_ID ");
								
								$stmt->bindparam(":user_pass",$unread);
								$stmt->bindparam(":user_ID",$messg);
								
								$stmt->execute();
			return $stmt;
			
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}


	public function consultant_read_message($unread,$messg)
	{
		try{

			$stmt = $this->conn->prepare("UPDATE sent_messages_cons SET status = :user_pass WHERE 
									ID=:user_ID ");
								
								$stmt->bindparam(":user_pass",$unread);
								$stmt->bindparam(":user_ID",$messg);
								
								$stmt->execute();
			return $stmt;
			
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}
	
}