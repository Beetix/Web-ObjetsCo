<?php
include ("./connectdb.php");
$bdd = Connect_db(); //connexion à la BDD
$query = $bdd->prepare('SELECT * FROM bdd_pizzas'); // requête SQL
$query->execute(); // paramètres et exécution
