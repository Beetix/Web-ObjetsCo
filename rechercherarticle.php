<?php
	require('base/init.php');

	init('recherchearticle');

	function recherchearticle()
	{
?>


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
<?php
	}
?>