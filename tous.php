<?php
	require('base/init.php');

	init('index');

	function index()
	{
?>
		
			
		<?php 
			$bdd = Connect_db();
			$reqarticle = $bdd->query('SELECT * FROM  articles');
			
		
			
			while($article = $reqarticle->fetch())
			{
				?> <article> <?php 
				if (!empty($article))
				{
				?>
				
				<?php echo '<h2> <a href="article.php?article_id=' . $article['article_id'] . '">' . $article['article_titre'] . '</a> </h2>'; ?>
							<img src="images/<?php echo $article['article_titre']; ?>" alt="<?php echo $article['article_titre']; ?>">
								
							<h3>  <?php echo $article['article_stitre']; ?> </h3>
							<quote>  <?php
							$req_user_name = $bdd->prepare('SELECT `utilisateur_name` FROM `utilisateurs` WHERE `utilisateur_id`=? ');
							$req_user_name->execute(array($article['utilisateur_id'])); // Reste à récupérer la donnée.
							while ($user_name=$req_user_name->fetch())
								{
									if(!empty($user_name))
									{
										echo 'Auteur : '.$user_name['utilisateur_name'].', et posté le : '.$article['article_date'];
									}
									else
									{
									echo 'Posté le : '.$article['article_date'];
									}
								}
							$req_user_name->closeCursor();
							?>
							</quote>
							<p> <?php echo substr($article['article_contenu'], 0, 100); ?> </p>
				<?php
	
					$reqcom = $bdd->query('SELECT *
											FROM commentaires
											INNER JOIN utilisateurs
											ON utilisateur_id = com_ref_auteur_id
											WHERE com_date = (SELECT MAX(com_date)
																FROM commentaires
																WHERE com_ref_article_id = ' . $article['article_id'] . ')
											');
					$derniercom = $reqcom->fetch();
					$reqcom->closeCursor();
					if(!empty($derniercom))
					{
						echo '<h3> Dernier commentaire de ' . $derniercom['utilisateur_pseudo'] . ' le ' . $derniercom['com_date'] . '</h3>'; 
						echo '<p>' . $derniercom['com_titre']  . ' : ' . $derniercom['com_contenu'] . '</p>';
					}
					else
					{
				?>
						<h3> Aucun commentaire... soyez le premier ! </h3>
				<?php	
					}
				}
				else
				{
				?>
					<h2> Oups... Aucun article sur le site </h2>
				<?php
				}
			echo '</article>';
		}
		$reqarticle ->closeCursor();
		?>
		
<?php
	}
			
?>

		
		