<?php
require_once 'class.admin.php';
$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
	$admin_home->redirect('index');
}


$stmt2 = $admin_home->runQuery("SELECT * FROM tbl_farmers");
$stmt2->execute();
$rowww = $stmt2->fetch(PDO::FETCH_ASSOC);
$t_users = $stmt2->rowCount();


$stmt2 = $admin_home->runQuery("SELECT * FROM tbl_consultants");
$stmt2->execute();
$rowww = $stmt2->fetch(PDO::FETCH_ASSOC);
$t_consult = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM farmer_posts");
$stmt2->execute();
$rowww = $stmt2->fetch(PDO::FETCH_ASSOC);
$t_products = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM message_posts");
$stmt2->execute();
$rowww = $stmt2->fetch(PDO::FETCH_ASSOC);
$t_messages = $stmt2->rowCount();


//top product
$stmt2 = $admin_home->runQuery("SELECT * FROM product_fav WHERE favourite = '1' GROUP BY postID  ORDER BY COUNT(*) DESC LIMIT 1");
$stmt2->execute();
$rowwwe = $stmt2->fetch(PDO::FETCH_ASSOC);
//$t_goods = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM product_fav WHERE favourite = '1' GROUP BY postID  ORDER BY COUNT(*) DESC ");
$stmt2->execute();
//$rowwwe = $stmt2->fetch(PDO::FETCH_ASSOC);
$t_goods = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM farmer_posts WHERE ID = '$rowwwe[postID]'");
$stmt2->execute();
$top_p = $stmt2->fetch(PDO::FETCH_ASSOC);

//top user

$stmt2 = $admin_home->runQuery("SELECT * FROM farmer_posts  GROUP BY email  ORDER BY COUNT(*) DESC LIMIT 1");
$stmt2->execute();
$rowwwed = $stmt2->fetch(PDO::FETCH_ASSOC);
//$t_goods = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM farmer_posts GROUP BY email  ORDER BY COUNT(*) DESC ");
$stmt2->execute();
//$rowwwe = $stmt2->fetch(PDO::FETCH_ASSOC);
$top_user = $stmt2->rowCount();

$stmt2 = $admin_home->runQuery("SELECT * FROM tbl_farmers WHERE name = '$rowwwed[email]'");
$stmt2->execute();
$top_u = $stmt2->fetch(PDO::FETCH_ASSOC);

?>