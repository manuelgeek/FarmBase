<?php

require_once '../dbconfig.php';

class ADMIN
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
	
	
	public function register_consultant($email,$upass)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_consultants(email,pass) 
			                                             VALUES(:user_mail, :user_pass)");
			
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			
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
			$stmt = $this->conn->prepare("SELECT * FROM tbl_admin WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				
					if($userRow['pass']==$upass)
					{
						$_SESSION['adminSession'] = $userRow['email'];
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
		if(isset($_SESSION['adminSession']))
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
		$_SESSION['adminSession'] = false;
	}
	
	public function delete_post($pid)
	{
		try
		{							
		$stmt = $this->conn->prepare("SELECT photo FROM farmer_posts WHERE ID=:pid");
		$stmt->execute(array(':pid'=>$pid));
		$imgRow=$stmt->fetch(PDO::FETCH_ASSOC);
		unlink("../post_images/".$imgRow['photo']); 


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
	

	
}