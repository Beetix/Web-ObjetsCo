<?php
function Connect_db(){
	$host="iutdoua-webetu.univ-lyon1.fr";
//	$host="localhost";
//	$host="https://iutdoua-webetu.univ-lyon1.fr/phpMyAdmin/";
	$user="p1414521";
	$password="221990";
	$dbname= "p1414521";
	try
	{
		$bdd=new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user,$password);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}


?>