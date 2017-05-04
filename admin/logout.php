<?php
session_start();
require_once 'class.admin.php';
$admin_logout = new ADMIN();

if(!$admin_logout->is_logged_in())
{
	$admin_logout->redirect('index.php');
}

if($admin_logout->is_logged_in()!="")
{
	$admin_logout->logout();	
	$admin_logout->redirect('index.php');
}
?>