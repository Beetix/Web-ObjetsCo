<?php
include ("./connectdb.php");
$bdd = Connect_db(); //connexion � la BDD
$query = $bdd->prepare('SELECT * FROM bdd_pizzas'); // requ�te SQL
$query->execute(); // param�tres et ex�cution
