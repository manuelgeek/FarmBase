<?php
session_start();
require_once 'class.farmer.php';
$farmer_home = new FARMER();

$stmt = $farmer_home->runQuery("SELECT * FROM message_posts WHERE ID=:email_id");
$stmt->execute(array(":email_id"=> $_SESSION['$var']));
$message = $stmt->fetch(PDO::FETCH_ASSOC);  

				$stmt2 = $farmer_home->runQuery("SELECT * FROM message_fav WHERE favourite = '1' AND postID = '$message[ID]' ");
				$stmt2->execute();
				$blog_likes = $stmt2->rowCount();
				?>
				<span class="itemed h4 " style="font-style: italic;"><?php echo $blog_likes; ?>Likes</span>