<?php
	require('base/init.php');

	init('index');

	function index()
	{
?>
		<section id="banniere">
			
			<h2> Bienvenue dans le monde des objets connectÃ©s ! </h2>
			<p>
				Vous trouverez ici les dernières actualités et les tests d'objets connectés
			</p>
			<p><i>Dernière mise à  jour du site web le 01/05/2015</i></p>

		</section>
			<div id=corps>
			<aside>
				<h2> Les news </h2>
				<section>
					<h3><em>Lien FB - 25/03/2015 - LM</em></h3>
					<p> 
						Allez vite découvrir notre nouvelle page <a href="http://www.facebook.com" >Facebook</a> !
					</p>
				</section>
				<section>
					<h3><em>Nouvel article - 23/03/2015 - Benjamin</em></h3>
					<p> 
						Nouvel article à  découvrir sur la moto 360 !
					</p>
				</section>
				<section>
					<h3><em>Communication - 18/03/2015 - LM</em></h3>
					<p> 
						N'hésitez pas à  partager sur vos réseaux sociaux notre nouveau blog !
					</p>
				</section>
			</aside>		
			
			<?php 
			$bdd = Connect_db();
			$queryrecent = $bdd->prepare('SELECT *
											FROM  `bdd_article` 
											WHERE article_date = ( 
											SELECT MAX( article_date ) 
											FROM  `bdd_article` )');
			$queryrecent->execute();
			while($ligne = $queryrecent->fetch())
			{
			?>
			<article>
			<h2> <a href="article.php"> Dernier article ajouté :  <?php echo $ligne['article_titre']; ?> </a> </h2>
						<img src="ressources/<?php echo $ligne['article_titre']; ?>.jpg" alt="<?php echo $ligne['article_titre']; ?>">
							
						<h3>  <?php echo $ligne['article_stitre']; ?> </h3>
						
						<p>
						<?php
						echo mb_strimwidth($ligne['article_contenu'], 0, 100);
						?>
								</p>
						
								<section>
									<h2> Dernier Commentaire </h2>
									<p>
										Tata Ã  19:35 la 26/03 - Blabla...
									<p>
								</section>
						</article>
			<?php 
			}
			$queryrecent->closeCursor();
			
			$query = $bdd->prepare('Select * FROM bdd_article');
			$query->execute();
			while($ligne = $query->fetch())
//			foreach(ligne as $l )
			{

			?>
			<a href="article.php?article_id=<?php echo $ligne['article_id'];?>">
			<article>
			<h2>  <?php echo $ligne['article_titre']; ?>  </h2>
			<img src="ressources/<?php echo $ligne['article_titre']; ?>.jpg" alt="<?php echo $ligne['article_titre']; ?>">
				
			<h3>  <?php echo $ligne['article_stitre']; ?> </h3>
			
			<p>
						<?php
						echo mb_strimwidth($ligne['article_contenu'], 0, 100);
						?>
						<p>
						<a href="article.php?article_id=<?php echo $ligne['article_id'];?>"> <?php echo 'Lire l\'article complet'; ?> </a>
						</p>
						
			</p>
			
			<section>
				<h2> Dernier Commentaire </h2>
				<p>
					Tata Ã  19:35 la 26/03 - Blabla...
				<p>
			</section>
			</article>
			</a>
			
			<?php 
			}
			$query->closeCursor();
			
	}
			?>
		
		