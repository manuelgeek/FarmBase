<?php

require_once 'dbconfig.php';

class CONSULTANT
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
	
	public function reset_pass($email,$phone,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("UPDATE tbl_consultants SET pass = :user_pass WHERE 
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
			$stmt = $this->conn->prepare("SELECT * FROM tbl_consultants WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				
					if($userRow['pass']==md5($upass))
					{
						$_SESSION['consultantSession'] = $userRow['email'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				
			}
			else
			{
				header("Location: index.php?error");
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
		if(isset($_SESSION['consultantSession']))
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
		$_SESSION['consultantSession'] = false;
	}
	
	public function delete_post($title)
	{
		try {
			// $stmt = $this->conn->prepare("SELECT * FROM tbl_farmers WHERE email='$_SESSION[farmerSession]'");
			// //$stmt->execute(array(":email_id"=>$email));
			// $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			// $userRow['email']

			$stmt = $this->conn->query("SELECT photo FROM farmer_posts WHERE email='$_SESSION[consultantSession]' AND name='$title'");
		//	$stmt_select->execute(array('$_SESSION[userSession]'=>$_GET['upload_pic']));
			$imgRow=$stmt->fetch_array();
			unlink("post_images/".$imgRow['photo']); 
			$stmt = $this->conn->query("DELETE FROM farmer_posts WHERE email='$_SESSION[consultantSession]' AND name='$title'");
			
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}

	public function consultant_post($title,$phone,$description,$cartegory,$userpic,$email,$piced)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO message_posts(title,phone,description,cartegory,photo,email,userpic) 
			                                             VALUES(:user_name, :user_phone, :user_desc, :user_cart, :user_pic, :user_email, :user_img)");
					$stmt->bindparam(":user_name",$title);
					
					$stmt->bindparam(":user_phone",$phone);
					
					$stmt->bindparam(":user_desc",$description);
					$stmt->bindparam(":user_cart",$cartegory);
					$stmt->bindparam(":user_pic",$userpic);
					$stmt->bindparam(":user_email",$email);
					$stmt->bindparam(":user_img",$piced);
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function consultant_profile($name,$phone,$userpic)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE tbl_consultants SET name = :user_name, phone = :user_phone, photo = :user_pic WHERE email='$_SESSION[consultantSession]' ");
			$stmt->bindparam(":user_name",$name);
			$stmt->bindparam(":user_phone",$phone);
			$stmt->bindparam(":user_pic",$userpic);

			$stmt->execute();	
			return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}
	
}