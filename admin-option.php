<?php 
header ('Content-Type: text/html; charset=utf-8');
require_once 'config.php';

$mode = (int) $_POST['mode'];
$id = (int) $_POST['option'];

if ( $mode == 1 ){

	$stmt = $dbh->prepare("SELECT main FROM pages WHERE id=:id");
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach($result as $k=>$v){
		echo $v['main'];
	}

} else if ( $mode == 2 ){
	$main = $_POST['text'];
	//$pos = mb_strpos($text, '</ul>', 0, 'UTF-8') + 5;
	//$main = mb_substr($text, $pos, mb_strlen($text, 'UTF-8'), 'UTF-8');
	$query = "UPDATE products SET main = '$main' WHERE id = $id";
	$stmt = $dbh->prepare($query);
	$stmt->execute();
	echo $stmt->rowCount();
}
