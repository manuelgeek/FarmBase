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
                                <a href="consultant_inbox_view.php?message=<?php echo $note['ID']; ?>">
                                     <?php
                            $stmt1 = $admin_home->runQuery("SELECT * FROM tbl_consultants WHERE name=:email_id AND photo!=''");
                            $stmt1->execute(array(":email_id"=>$note['name']));
                            if ($stmt1->rowCount() > 0) {
                                $rower = $stmt1->fetch(PDO::FETCH_ASSOC);?>
                                <span class="photo"><img class=" img-circle" alt="avatar" src="consultants/consult_images/<?php echo $rower['photo']; ?>" height="30px"></span>
                       <?php     } else {
                            $stmt1 = $admin_home->runQuery("SELECT * FROM tbl_farmers WHERE name=:email_id AND photo!=''");
                            $stmt1->execute(array(":email_id"=>$note['name']));
                            if ($stmt1->rowCount() > 0) {
                                $rower = $stmt1->fetch(PDO::FETCH_ASSOC);?>
                                <span class="photo"><img class=" img-circle" alt="avatar" src="farmer_images/<?php echo $rower['photo']; ?>" height="30px"></span>
                      <?php } else { ?>
                                <span class="photo"><img class=" img-circle" alt="avatar" src="img/user.png" height="30px"></span>
                      <?php }
                        } ?>
                                    <span class="subject">
                                    <span class="from"><?php echo $note['name']; ?></span>
                                    <span class="time"><?php 
                                              date_default_timezone_set('Africa/Nairobi'); 
                                                $timed = $note['timer'];

                                               $timestamp = strtotime($timed);  
                                               
                                               $strTime = array("second", "minute", "hour", "day", "month", "year");
                                               $length = array("60","60","24","30","12","10");

                                               $currentTime = time();
                                               if($currentTime >= $timestamp) {
                                                    $diff     = time()- $timestamp;
                                                    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                                    $diff = $diff / $length[$i];
                                                    }
                                                    $diff = round($diff);
                                                    echo $diff . " " . $strTime[$i] . "(s) ago ";
                                               } ?></span>
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
                                    <a href="consultant_inbox">See all messages</a>
                                </li>

                    <?php } else {?>
                                <li>
                                    <a href="#">No new Messages ...</a>
                                </li>
                                <li>
                                    <a href="consultant_inbox">See all messages</a>
                                </li>
                    <?php } ?>
                            </ul>

                            