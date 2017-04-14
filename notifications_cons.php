<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();

if($farmer_home->is_logged_in()){
$stmt = $farmer_home->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

$admin_home = new CONSULTANT();

    if($admin_home->is_logged_in()){
    $stmt = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE email=:email_id");
    $stmt->execute(array(":email_id"=>$_SESSION['consultantSession']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
$name = $row['name'];


        $stmt = $farmer_home->runQuery("SELECT * FROM sent_messages_cons WHERE receiverEmail=:email_id AND status = 'unread' ORDER BY ID DESC LIMIT 0,10");
        $stmt->execute(array(":email_id"=> $name));


?>                      

                             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           Notifications <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-theme"><?php echo $stmt->rowCount(); ?></span>
                            </a>
                            <ul class="dropdown-menu extended inbox" >

                    <?php  if ($stmt->rowCount() > 0) {
                             while($note = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                                <li>
                                <a href="#">
                                    <span class="photo"><img class=" img-circle" alt="avatar" src="img/user.png" height="30px"></span>
                                    <span class="subject">
                                    <span class="from"><?php echo $note['name']; ?></span>
                                    <span class="time"><?php echo $note['timer']; ?></span>
                                    </span>
                                    <span class="message">
                                        <?php
                                            $position = 100;
                                            $messo = $note['message'];
                                            $poster = substr($messo,0,$position);
                                            echo $poster;
                                            echo "..."; 
                                         ?>
                                    </span>
                                </a>
                                </li>
                    <?php } ?>
                                <li>
                                    <a href="#">See all messages</a>
                                </li>

                    <?php } else {?>
                                <li>
                                    <a href="">No new Messages ...</a>
                                </li>
                                <li>
                                    <a href="#">See all messages</a>
                                </li>
                    <?php } ?>
                            </ul>

                            