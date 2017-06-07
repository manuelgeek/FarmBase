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
						unset($_SESSION['farmerSession']);
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
	
	public function delete_post($pid)
	{
		try
		{							
		$stmt = $this->conn->prepare("SELECT photo FROM message_posts WHERE ID=:pid");
		$stmt->execute(array(':pid'=>$pid));
		$imgRow=$stmt->fetch(PDO::FETCH_ASSOC);
		unlink("message_images/".$imgRow['photo']); 


		$stmt = $this->conn->prepare("DELETE FROM message_posts WHERE ID=:pid");
		$stmt->execute(array(':pid'=>$pid));
          
		
			
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function consultant_post($title,$phone,$description,$cartegory,$userpic,$userName,$piced,$userEmail)
	{
		try {
			 

					$stmt = $this->conn->prepare("INSERT INTO message_posts(title,phone,description,cartegory,photo,userName,userpic,userEmail) 
			                                             VALUES(:user_name, :user_phone, :user_desc, :user_cart, :user_pic, :user_email, :user_img, :userEmail)");
					$stmt->bindparam(":user_name",$title);
					
					$stmt->bindparam(":user_phone",$phone);
					
					$stmt->bindparam(":user_desc",$description);
					$stmt->bindparam(":user_cart",$cartegory);
					$stmt->bindparam(":user_pic",$userpic);
					$stmt->bindparam(":user_email",$userName);
					$stmt->bindparam(":user_img",$piced);
					$stmt->bindparam(":userEmail",$userEmail);
					
					$stmt->execute();	
					return $stmt;
				
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	public function consultant_edit_post($id,$title,$phone,$description,$cartegory,$userName,$piced,$userEmail)
	{
		try {
			$stmt = $this->conn->prepare("UPDATE message_posts SET title = :title, phone = :user_phone
										 , description = :descript , cartegory = :cart , userName = :uname ,
										 userpic = :user_pic ,userEmail = :user_e WHERE ID = :id ");
			$stmt->bindparam(":title",$title);
			
			$stmt->bindparam(":user_phone",$phone);
			
			$stmt->bindparam(":descript",$description);
			$stmt->bindparam(":cart",$cartegory);
			$stmt->bindparam(":uname",$userName);
			$stmt->bindparam(":user_pic",$piced);
			$stmt->bindparam(":user_e",$userEmail);
			$stmt->bindparam(":id",$id);

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