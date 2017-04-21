<?php
session_start();
require_once 'class.consultant.php';
$consult_logout = new CONSULTANT();

if(!$consult_logout->is_logged_in())
{
	$consult_logout->redirect('index');
}

if($consult_logout->is_logged_in()!="")
{
	$consult_logout->logout();	
	$consult_logout->redirect('index');
}
?>