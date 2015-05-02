<?php
	require('base/init.php');

	init('article');

	function article()
	{
?>
		<?php 
		
		if (!isset($_GET['article_id'])) 
		{
		// code à exécuter si invalide
		echo "Vous n'avez pas défini d'article à visualiser ou l'article demandé n'existe pas.";
		} 
		else
		{
			$id = (int) $_GET['article_id'];
		

			//$userid = (int) $_GET['user_id'];

			if (count($_POST) > 0)
			// executer procédure pour ajouter le commentaire
			{
				$bdd = Connect_db(); //connexion à la BDD
				/*
				$query_name= $bdd -> prepare('SELECT `utilisateur_name` FROM `bdd_utilisateurs` WHERE `utilisateur_id`= :userid;
											 VALUES (:userid)');
				$query_name -> execute(array('userid' => $userid));
				while($name = $query_name -> fetch())
				{
					$name_userid = $name['utilisateur_name'];
				}
				*/
				if (!isset($_GET['user_id']))
				{
					$user_id=1;
				}
				
				$querycom=$bdd->prepare('
									INSERT INTO bdd_commentaire (`com_contenu`, `com_ref_auteur_id`, `com_ref_article_id`,`com_titre`)
									VALUES
									(:content,:userid,:refarticleid,:titre);'
				);

				$querycom->execute(array
						(		
						'content' => $_POST['com_contenu'],
						'userid' => $_GET['userid'],
						'refarticleid' => $_GET['article_id'],
						'titre' => $_POST['com_titre']
				)
				);
			}

			// TODO Il faut remplacer le vieux userid du formulaire par lecture du cookie et du numéro d'utilisateur

			// Faire la requete qui récupère toutes les données de l'article dont l'id est dans $GET
					
					$bdd = Connect_db();
					$querysolo = $bdd->prepare('SELECT * FROM  `bdd_article` WHERE article_id = :id');
					$querysolo->execute(array('id' => $id));
					while($ligne = $querysolo->fetch())
					{
						?>
								<article>
								<h2> <a href="article.php"> <?php echo $ligne['article_titre']; ?> </a> </h2>
											<img src="ressources/<?php echo $ligne['article_titre']; ?>.jpg" alt="<?php echo $ligne['article_titre']; ?>">
												
											<h3>  <?php echo $ligne['article_stitre']; ?> </h3>
											
											<p>
											<?php echo $ligne['article_contenu']; ?>
													</p>
											
											

										<section>
											<h2> Commentaires </h2>
											
												<?php 
												$querycom = $bdd->prepare('SELECT com_id,com_date,com_contenu,utilisateur_name
														 FROM  `bdd_commentaire` com, `bdd_utilisateurs` auteur
														WHERE com.com_ref_auteur_id=auteur.utilisateur_id
														 AND com_ref_article_id = :id');
												$querycom->execute(array('id' => $id));
												while($com = $querycom->fetch())
												{
												?>
													<p>
														<?php echo $com['com_id'].' id de l\'auteur. '; ?> posté le <?php echo $com['com_date'].'.' ?>
													</p>
													<p>
													<?php echo " - ".$com['com_contenu']; ?>
													</p>
												<?php
												}
												$querycom->closeCursor();


										// et rajouter test pour savoir si la personne est connectée
										// si oui, afficher :
										{
										?>
											<fieldset>
												<form method="post" enctype="multipart/form-data" action="">
													<legend>Votre commentaire</legend>
												
														<p>
															<label> Titre : <input type="text" name="com_titre" placeholder="Titre ou Pseudo - 45 carcatères max."></label>
														</p>
														<p>
															<label> Votre numéro d'utilisateur : <input type="text" name="utilisateur_id" placeholder="Numéro d'utilsateur. (1 : admin et 0 user)"></label>
														</p>
														<p>
															<label>Contenu : <br/> <textarea type="text" name="com_contenu" rows="10" cols="50"></textarea>
															</label>
														</p>
													<button type="submit" value="Envoyer">Soumettre !</button>
												</form>
											</fieldset>
										<?php 
										// else if (non connecté)
										// Si non connecté, afficher :
										?>
										
																<h2> Vous devez être connecté pour ajouter un commentaire. <a href="authentification.php">Se connecter</a> </h2>
										
										</section>
								</article>
								<?php 
								}
								$querysolo->closeCursor();

				}
		}
	}
?>
	