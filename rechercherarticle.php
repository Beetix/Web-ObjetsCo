<?php
	require('base/init.php');

	init('recherchearticle');

	function recherchearticle()
	{
?>


		<section>
			<h2>Rechercher un article</h2>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">	
				<fieldset>
					<legend>Outils de recherche</legend>				
						<table>
							<tr>
								<th>Mots-clés</th> 
								<td><input type="text" name="mot-cle" placeholder="Motorola Apple Gorilla Glass"></td>
								<td rowspan=3><button type="submit" value="rechercher"><img src="ressources/Loupe.png"></button> </td>
							</tr>
						</table>
					
				</fieldset>

			</form>	
		</section>
	<?php
		if (!empty($_POST['mot-cle']))
		{
			$bdd = Connect_db();
			$reqrech = $bdd->prepare('SELECT article_date, article_titre, article_stitre, article_contenu,article_id FROM articles WHERE article_titre LIKE :mot OR article_stitre LIKE :mot OR article_contenu LIKE :mot');
			$reqrech->execute(array('mot' => '%' . $_POST['mot-cle'] . '%'));

	?>
		<section id='resultats'>
				<h2> Résultats </h2>
				
					<?php

						if (!$resultat = $reqrech->fetch(PDO::FETCH_ASSOC))
						{
							echo '<h3> Article(s) introuvable(s)... </h3>'; 
						}
						else
						{
					?>
							<table>
								<tr>
									<th>Date</th> 
									<th>Titre</th> 
									<th>Sous-Titre</th>
									<th>Contenu</th>
								</tr>
					<?php
							do							
							{

								echo '<tr>';

								foreach ($resultat as $valeur) {
									$texte = substr($valeur, 0, 50);
									if(strlen($valeur) > 50)
										$texte = $texte . '...';
									echo '<td><a href="article.php?article_id=' . $resultat['article_id'] . '">' . $texte .'</a>'. '</td>';
								}
								echo '</tr>';
							}
							while($resultat = $reqrech->fetch(PDO::FETCH_ASSOC));
						}
						$reqrech->closeCursor();
					?>
				</table>
		</section>
	<?php
		}
	?>

<?php
	}
?>