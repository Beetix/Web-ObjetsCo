<!DOCTYPE html>
<html>

<?php
include 'header.php';
?>

	<body>

		<header>
			<h1> Connectif </h1>
			<nav>
				<ul>
					<li> <a href="index.php"> Accueil </a> </li>
					<li> <a href="ajoutarticle.php"> Ajouter un article </a> </li>
					<li> <a href="rechercherarticle.php" class="actuel"> Rechercher un article </a> </li>
					<li> <a href="apropos.php"> A propos </a> </li>
				</ul>
	
				<img src="ressources/prise.png" alt="prise">
	
			</nav>
		</header>
		



		<section>
			<h2>Rechercher un article</h2>
			<form method="post" action="resultat_recherche.php">	
				<fieldset>
					<legend>Outils de recherche avancée</legend>				
						<table>
							<tr>
								<th>Mots-clés</th> 
								<td><input type="text" name="mot-cle" placeholder="Motorola Apple Gorilla Glass"></td>
								<td rowspan=3><button type="submit" value="rechercher"><img src="ressources/Loupe.png"></button> </td>
							</tr>
							<tr>
								<th>Mois (optionnel)</th> 
								<td><input type="text" name="pseudo" placeholder="Mois, sous la forme 04/2015 pour Avril 2015."></td>
							</tr>
							<tr>
								<th>Auteur (optionnel)</th> 
								<td><input type="text" name="pseudo" placeholder="Pseudo de l'auteur : par exemple @BenjiLePatron"></td>
							</tr>
						</table>
					
				</fieldset>

			</form>	
		</section>

		<footer>
			<p>Réalisé par De Suremain Louis-Marie et Freeman Benjamin </p>

		</footer>
	</body>

</html>