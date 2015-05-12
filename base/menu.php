<?php
	$pages = array('index' => 'Accueil','tous' => 'Tous les articles', 'ajoutarticle' => array('Ajouter un article', 'webmaster'), 'rechercherarticle' => 'Rechercher un article', 'apropos' => 'A propos', 'authentification' => 'Se connecter'); 
?>
<nav>
	<ul>
<?php
	foreach ($pages as $fichier => $texte) {
		if (!is_array($texte) or isset($_SESSION['est_admin'])) // L'information webmaster est le fait d'utiliser une array ou non
		{
			if (is_array($texte))
				$texte = $texte[0];
			
			if (!strcmp($callback, $fichier))
				echo '<li> <a href="' . $fichier . '.php" class="actuel">' . $texte . '</a> </li>';
			else
				echo '<li> <a href="' . $fichier . '.php">' . $texte . '</a> </li>';
		}
	}
	if (isset($_SESSION['utilid']))
	{
		echo '<li> <a href="base/sessiondestroy.php">Deconnexion</a> </li>';
	}
?>
	</ul>
	
	<a href="index.php" ><img src="ressources/prise.png" alt="prise"></a>

</nav>