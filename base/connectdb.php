<?php
function Connect_db(){
	$host="iutdoua-webetu.univ-lyon1.fr";
	$user="p1414521";
	$password="221990";
	$dbname= "p1414521";

	//$host="localhost"; // ou sql.hebergeur.com
   // $user="root";      // ou login
    //$password="";      // ou xxxxxxs
    //$dbname= "projet";
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