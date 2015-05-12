<?php
	require('base/init.php');

	init('article');

	function article()
	{
?>
	<?php
		
		
		if (isset($_GET['article_id'])) 
		{
			$bdd = Connect_db(); //connexion à la BDD 
			$id = (int) $_GET['article_id'];

			
			$req_article = $bdd->prepare('SELECT * FROM  articles WHERE article_id = :id');
			$req_article->execute(array('id' => $id));
			$article = $req_article->fetch();
			$req_article->closeCursor();
			
			if($article)
			{
				if (!empty($_POST))
				// executer procédure pour ajouter le commentaire
				{
				
					if (!isset($_SESSION['utilid']))
					{
						$erreur = true;
						echo "<h2> Vous n'êtes pas connecté ! </h2>";
					}
					
					if(!(isset($_POST['com_titre']) && !empty($_POST['com_titre'])))
					{
						$erreur = true;
						echo "<h2> Vous avez oublié un titre </h2>";
					}
					if(!(isset($_POST['com_contenu']) && !empty($_POST['com_contenu'])))
					{
						$erreur = true;
						echo "<h2> Vous avez oublié le contenu </h2>";
					}

					if(!isset($erreur))
					{
						$ajout_com=$bdd->prepare('
										INSERT INTO commentaires (com_contenu, com_ref_auteur_id, com_ref_article_id,com_titre, com_date)
										VALUES
										(:content,:userid,:refarticleid,:titre, NOW());'
						);

						$ajout_com->execute(array
								(		
									'content' => $_POST['com_contenu'],
									'userid' => $_SESSION['utilid'],
									'refarticleid' => $_GET['article_id'],
									'titre' => $_POST['com_titre']
								)
						);
					}
				}
		?>
				<article>

					<h2> <a href="article.php"> <?php echo $article['article_titre']; ?> </a> </h2>
					<img src="images/<?php echo $article['article_id']; ?>" alt="<?php echo $article['article_titre']; ?>">
								
					<h3>  <?php echo $article['article_stitre']; ?> </h3>
							
					<p> <?php echo $article['article_contenu']; ?> </p>

					<section>

						<h2> Commentaires </h2>
							
						<?php 
							$req_com = $bdd->prepare('SELECT *
									 FROM  commentaires
									 INNER JOIN utilisateurs
									 ON com_ref_auteur_id = utilisateur_id
									 WHERE com_ref_article_id = :id');

							$req_com->execute(array('id' => $id));
							while($com = $req_com->fetch())
							{
						?>
								<section style="font-size:small">
									<h3>
										<?php echo $com['utilisateur_pseudo'] . ' à posté le ' . $com['com_date']; ?>
									</h3>
									<p>
										<?php echo $com['com_titre']; ?>
									</p>								
									<em>
										<?php echo $com['com_contenu']; ?>
									</em>
								</section>
						<?php
							}
							
							$req_com->closeCursor();

							if (isset($_SESSION['utilpseudo']))
							{
						?>
								<fieldset>
									<form method="post" enctype="multipart/form-data" action="">
										<legend>Votre commentaire</legend>
									
											<p>
												<label> Titre : <input type="text" name="com_titre" placeholder="Titre ou Pseudo - 45 carcatères max."></label>
											</p>
											<p>
												<label>Contenu : <br/> <textarea type="text" name="com_contenu" rows="10" cols="50"></textarea>
												</label>
											</p>
										<button type="submit" value="Envoyer">Soumettre !</button>
									</form>
								</fieldset>
						<?php 
							}
							else 
							{
								echo "<h2> <a href=\"authentification.php\"> Connectez vous </a> pour ajouter un article ! </h2>";
							}
						?>
																			
					</section>
				</article>
		<?php
			}
			else
			{
				echo "<h2> L'article que vous avez demandez n'existe pas </h2>";
			}
		}
		else
		{
			echo "<h2> Vous n'avez pas défini d'article à visualiser </h2>";
		}
	}
?>
		
