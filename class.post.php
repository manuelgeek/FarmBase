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
		//   error_reporting( ~E_NOTICE ); // avoid notice

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
			// 	 if (isset($_POST['btn-more'])) {
			// 	$btn = trim($_POST['btn-more']);

			// 	 header("Location: index.php?more_view");
			// }  
				?>
				

              <div class="col-md-3  col-xs-6 col-sm-3 row-eq-height "  id="mauni">
              	<div class="card panel panel-default" id="item-single">
               <div class="img-solo panel-heading __item-image">
                <?php if ( $row['photo']==''){
                 echo ""; 
                }else {?>
                	
                	 <img  src="post_images/<?php echo $row['photo']; ?>"  class=" product-img item_image img-responsive" />
                	
		               <?php }
		               		
                ?>
               
               </div>
               <div class="post-solo panel-body">
	              <!--   <p class="itemed"><?php //echo $row['cartegory']; ?></p> -->
	              
	              <h5 class="itemed h4"><b><?php echo $row['title']; ?></b> &nbsp; &nbsp; &nbsp; 

	                  <span style="font-style: italic; "><?php 
	                 date_default_timezone_set('Africa/Nairobi');
					              $timed = $row['timer'];

								   $timestamp = strtotime($timed);	
								   
								   $strTime = array("sec", "min", "hr", "day", "mth", "yr");
								   $length = array("60","60","24","30","12","10");

								   $currentTime = time();
								   if($currentTime >= $timestamp) {
										$diff     = time()- $timestamp;
										for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
										$diff = $diff / $length[$i];
										}
										$diff = round($diff);
										$timeded =  $diff . " " . $strTime[$i] . "(s) ";
										echo $timeded;
								   } ?></span> </h5>
					             
               
                
		             
		                <span class="phoned"><b>Sh. <?php echo $row['price']; ?></b></span>
				        <span class="phoned"> | <?php echo $row['email']; ?> | &nbsp; <?php echo $row['location']; ?></span>
                 </div>
                 <div class="panel-footer">
                 	<div class="" role="group" aria-label="Basic example" style="width:100%">
					  <a type="button" class="btn small btn-secondary btn-sm __item-cta" style="font-size: 10px;width:100%"><?php echo $row['phone']; ?></a>
					  <a href="post_view.php?var=<?php echo $row['ID']; ?>" class="btn small btn-secondary btn-sm __item-cta" style="font-size: 10px;width:100%">View Product</a>
					</div>
                 	
	           	 </div>

            </div>
          </div> 
               
                <?php
			}
		}
		else
		{
			?>
			<div class="__nothing">
				<i class="fa fa-meh-o"></i>
				<h1 class="__nothing-text">Nothing here</h1>
			</div>
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
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
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