<?php
session_start();
require_once 'class.farmer.php';
$farmer = new FARMER();

if(!$farmer->is_logged_in())
{
	$farmer->redirect('index.php');
}

if($farmer->is_logged_in()!="")
{
	$farmer->logout();	
	$farmer->redirect('index.php');
}
?>