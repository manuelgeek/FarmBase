<?php
session_start();
require_once 'class.farmer.php';
require_once 'consultants/class.consultant.php';


$item_per_page = 5;
//sanitize post value
if(isset($_POST["page"])){
  $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
  if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
  $page_number = 1;
}
//get current starting point of records
$position = (($page_number-1) * $item_per_page);

    //real code is here...
    $farmer_search = new FARMER();

    $query = $_SESSION['$query']; 
    // gets value sent over search form
     
    $min_length = 1;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $raw_results = $farmer_search->runQuery( "SELECT * FROM farmer_posts
            WHERE (`title` LIKE '%$query%') OR (`price` LIKE '%$query%') OR (`description` LIKE '%$query%') OR(`cartegory` LIKE '%$query%') OR(`phone` LIKE '%$query%') OR(`email` LIKE '%$query%') OR(`location` LIKE '%$query%') LIMIT $position, $item_per_page") ;
        $raw_results->bindValue(1, "%$query%", PDO::PARAM_STR);
        $raw_results->execute();
        ?>

<div class="container col-md-12">
     <?php echo '<b>Showing results related to ;<p class="text-danger">"'.$query.'"</p></b>';?>
 <?php
        if($raw_results->rowCount() > 0){ // if one or more rows are returned do following
             
            while($results=$raw_results->fetch(PDO::FETCH_ASSOC)){
              
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
              echo'<div class="panel panel-default">
  <div class="panel-body">
<div class="service-grd">
  <div class="col-sm-4 col-md-4">
     <div class="col-md-12  ">
         <img  src="post_images/'.$results['photo'].'"  class="item_image img-responsive" />
       </div>
  </div>
  <div class="col-md-8 col-sm-8">
    <h3><a href="post_view.php?id='.$results['ID'].'">'.str_replace($query, '<b>'.$query.'</b>', $results['title']).'</a></h3>
    <h5>'.str_replace($query, '<b>'.$query.'</b>', $results['cartegory']).'</h5>
    <span style ="font-size:20px;">Price:'.str_replace($query, '<b>'.$query.'</b>', $results['price']).'</span>
    <div class="desc text-success" data-limit="10"><i>Location: '.str_replace($query, '<b>'.$query.'</b>', $results['location']).'</i></div>
         <a href="post_view.php?var='.$results['ID'].'">
        <button class="btn btn-success btn-xs" name="btn-more" value="'.$results['ID'].'" type="submit">Read More...</button>
         </a>
    <p>'.str_replace($query, '<b>'.$query.'</b>', $results['email']).' | '.str_replace($query, '<b>'.$query.'</b>', $results['phone']).'</p>
  </div>
</div>
  </div>
</div> ';

 }
}
else{ // if there is no matching rows do following
            echo '<b>No results Found for the search term "'.$query.'"</b> 
            <h4 class="text-left">possible suggestions</h4>
            <ul>
            <li class="text-left">Try being specific</li>
            <li class="text-left">Be as precice as possible</li>
            <li class="text-left">Try searching for products category</li>
            <li class="text-left">No such products exists in our site currently</li>
            </ul>';
        }
         
    }
    else{ // if query length is less than minimum
        echo '<p>Minimum search term length is '.$min_length.' characters,please try again.</p>';
    }
?> 
</div>