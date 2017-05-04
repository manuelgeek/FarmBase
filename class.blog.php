<?php

				

class paginate
{
	private $db;
	
	function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;

		// $this->db = $conn;
	}
	
	public function dataview($query)
	{
		//  

		// $farmer_name = new FARMER();
		// 					$stmt = $farmer_name->runQuery("SELECT * FROM tbl_farmers WHERE email=:email_id");
		// 					$stmt->execute(array(":email_id"=>$_SESSION['farmerSession']));
		// 					$name = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $this->conn->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{

			

				?>

				
				<!-- if (isset($_POST['btn-more'])) {
				$btn = trim($_POST['btn-more']);

				 header("Location: blog.php?more");
			}  -->

              <div class="col-md-12  col-xs-12 col-sm-12 row-eq-height  card"  id="mauni">
                <div class="col-md-3 col-sm-3">
                <?php if ( $row['photo']==''){
                 echo ""; 
                }else {?>
                	
                	 <img  src="consultants/message_images/<?php echo $row['photo']; ?>" style="padding: 10px 0px;"  class="item_image img-responsive" />

	
	

   <?php }
                ?>
               	</div>
                	
                <div class="col-md-9 col-sm-9 ">
	                <a href="blog_view.php?page=<?php echo $row['ID']; ?>"><h4 class="itemed h4"><b><?php echo $row['title']; ?></b></h4></a>
	                <span class="text"><?php
	                	$position = 150;
	                	$message = $row['description'];
	                	$post = substr($message,0,$position);
	                	
	                	echo $post;
	                	echo "...";


	                  ?>
					  <a href="blog_view.php?page=<?php echo $row['ID']; ?>"><button class="btn btn-success btn-xs" type="submit" name="btn-more" value="<?php echo $row['ID']; ?>">Read More...</button></a>&nbsp;&nbsp;
					 </span>
	                 <span class="phoned"><b> <?php echo $row['email']; ?> </b>&nbsp;&nbsp;&nbsp;</span>
	                   <span  class="priced btn btn-default btn-xs"> <?php echo $row['phone']; ?></span>&nbsp;&nbsp;&nbsp;
	                    <span class="itemed h5 " style="font-style: italic;"><?php
	                     date_default_timezone_set('Africa/Nairobi'); 
	                    			$timed = $row['timer'];

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
					  <!-- <span>Favourite&nbsp;</span><i class="glyphicon glyphicon-star"></i>&nbsp;&nbsp;
					  <span>Comment&nbsp;</span><i class="glyphicon glyphicon-comment"></i><br> -->
               </div><br>
            </div> 
               
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		 error_reporting( ~E_NOTICE ); // avoid notice
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->conn->prepare($query);
		if ($stmt->rowCount() >0) {
			$stmt->execute();
		}
		
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><tr><td colspan="3"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];

			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				
				echo "<li><a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;</li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;</li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{		
					
					echo "<li class='active'><a href='".$self."?page_no=".$i."'>".$i."</a></li>";

				}
				else
				{	 
					echo "<li><a  href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;</li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a  href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;</li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;</li>";
				
			}
			?></td></tr><?php
		}
	}
}