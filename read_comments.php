<?php
session_start();
	require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';
$farmer_home = new FARMER();
$admin_home = new CONSULTANT();		               			
 
			               				$stmt = $farmer_home->runQuery("SELECT * FROM comment_posts WHERE postID=:email_id ORDER BY ID DESC LIMIT 10");
										$stmt->execute(array(":email_id"=>$_SESSION['$var']));
										if($stmt->rowCount()>0){
											while ($comm = $stmt->fetch(PDO::FETCH_ASSOC)) {
												?>
								
									<div class="col-md-3 col-sm-3 col-xs-2">
				            			<?php
				            			 if ($comm['userpic']=="") {
												$pic3 = "<img class='img-circle ' src='img/user.png' style='' padding:0px; height=50px width=50px />";
											}
				            			 ?>
				            				<?php
													if(isset($pic3)){
														echo $pic3;
													} else { ?>									

													<img class="img-circle " src="farmer_images/<?php echo $comm['userpic']; ?>"  style=" padding:0px;"  height=50px />
												<?php
												}?>
				            		</div>
				            		<div class="col-md-9 col-sm-9 col-xs-10">
				            			<p class="text"><?php echo $comm['comment']; ?></p>
				            			<span class="phoned"><?php echo $comm['email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				            			 <span class="itemed h5 " style="font-style: italic;"><?php 
					                  date_default_timezone_set('Africa/Nairobi'); 
			                    			$timed = $comm['timer'];

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
										   } ?></span></span>

				            			
								</div>
				            
											<?php }
										} else
											{
												?>
									            <tr>
									            <td>No Comments here...</td>
									            </tr>
									            <?php
											}
											
										
										?>