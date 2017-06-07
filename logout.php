<?php
session_start();
require_once 'class.farmer.php';
$farmer = new FARMER();

if(!$farmer->is_logged_in())
{
	$farmer->redirect('index');
}

if($farmer->is_logged_in()!="")
{
	$farmer->logout();	
	if(isset($_SESSION['redirect_url'])){
			$redirect_url = (isset($_SESSION['redirect_url'])) ? $_SESSION['redirect_url'] : '/';
			unset($_SESSION['redirect_url']);
			header("Location: $redirect_url", true, 303);
		} else {
		$farmer->redirect('index');
		}
	
}
?>