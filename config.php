<?php

try{
	$dbh = new PDO('mysql:host=localhost;dbname=welltech;charset=utf8', 'V0uTsasKostas', 'Zt3l!oUsS');
	//$dbh = new PDO('mysql:host=localhost;dbname=welltech;charset=utf8', 'root', '');
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}

