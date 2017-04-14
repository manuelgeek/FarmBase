<?php
require_once 'class.farmer.php';

$ajax = new FARMER();

//$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$query = $ajax->runQuery( "SELECT * FROM farmer_posts WHERE (title LIKE (:keyword)) OR (location LIKE (:keyword))  ORDER BY ID ASC LIMIT 0, 10");
//$query = $conn->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$searched = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['title']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['title']).'\')">'.$searched.'</li>';
}
?>