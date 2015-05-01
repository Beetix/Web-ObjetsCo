<?php 
include 'connectdb.php';
?>
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
					<li> <a href="index.php" class="actuel"> Accueil </a> </li>
					<li> <a href="ajoutarticle.php"> Ajouter un article </a> </li>
					<li> <a href="rechercherarticle.php"> Rechercher un article </a> </li>
					<li> <a href="apropos.php"> A propos </a> </li>
					<li> <a href="authentification.php"> Se connecter </a> </li>
				</ul>
	
				<a href="index.php" ><img src="ressources/prise.png" alt="prise"></a>
	
			</nav>
		</header>



		<section id="banniere">
			
			<h2> Bienvenue dans le monde des objets connect√©s ! </h2>
			<p>
				Vous trouverez ici les derniËres actualitÈs et les tests d'objets connectÈs
			</p>
			<p><i>DerniËre mise ‡† jour du site web le 01/05/2015</i></p>

		</section>
			<div id=corps>
			<aside>
				<h2> Les news </h2>
				<section>
					<h3><em>Lien FB - 25/03/2015 - LM</em></h3>
					<p> 
						Allez vite dÈcouvrir notre nouvelle page <a href="http://www.facebook.com" >Facebook</a> !
					</p>
				</section>
				<section>
					<h3><em>Nouvel article - 23/03/2015 - Benjamin</em></h3>
					<p> 
						Nouvel article ‡† dÈcouvrir sur la moto 360 !
					</p>
				</section>
				<section>
					<h3><em>Communication - 18/03/2015 - LM</em></h3>
					<p> 
						N'hÈsitez pas ‡† partager sur vos rÈseaux sociaux notre nouveau blog !
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
			<h2> <a href="article.php"> Dernier article ajoutÈ :  <?php echo $ligne['article_titre']; ?> </a> </h2>
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
										Tata √† 19:35 la 26/03 - Blabla...
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
					Tata √† 19:35 la 26/03 - Blabla...
				<p>
			</section>
			</article>
			</a>
			
			<?php 
			}
			$query->closeCursor();
			?>
			
			<article>
					<h2> <a href="article.php"> La moto 360 </a> </h2>
					<img src="ressources/moto360.jpg" alt="moto360">
					
					<h3> Le petit bijou de Motorola </h3>
		
					<p> 
						Nous avons pu mettre la main dessus... elle est superbe ! Vous avez envie d'enrichir votre exp√©rience android, cette montre est pour vous.
						Nous avons pu mettre la main dessus... elle est superbe ! Vous avez envie d'enrichir votre exp√©rience android, cette montre est pour vous.
						Nous avons pu mettre la main dessus... elle est superbe ! Vous avez envie d'enrichir votre exp√©rience android, cette montre est pour vous.
						Nous avons pu mettre la main dessus... elle est superbe ! Vous avez envie d'enrichir votre exp√©rience android, cette montre est pour vous.
						Nous avons pu mettre la main dessus... elle est superbe ! Vous avez envie d'enrichir votre exp√©rience android, cette montre est pour vous.
					</p>

					<section>
						<h2> Commentaires </h2>
						<p>
							Toto ‡† 22:55 la 26/03 - Blabla...
						<p>
						<p>
							Tutu ‡† 20:12 la 26/03 - Blabla...
						<p>
						<p>
							Tata ‡† 19:35 la 26/03 - Blabla...
						<p>
					</section>
			</article>
			<article>
					<h2> Les cubes Sifteo </h2>
					<img src="ressources/cubesconnecte.jpeg" alt="Quelqu'un joue avec des cubes connect√©s.">
					
					<h3> Une startup qui innove ! </h3>
		
					<p> 
						Pour prendre une place dans ce monde connect√©, la soci√©t√© Sifteo a mis au point des cubes connect√©s.
						 Ce systËme de divertissement est unique en son genre.
						  Le concept de cette cr√©ation consiste √† jouer avec plusieurs cubes connect√©s que l‚Äôont fait interagir entre eux.
						  Pour prendre une place dans ce monde connect√©, la soci√©t√© Sifteo a mis au point des cubes connect√©s.
						 Ce systËme de divertissement est unique en son genre.
						  Le concept de cette cr√©ation consiste √† jouer avec plusieurs cubes connect√©s que l‚Äôont fait interagir entre eux.
					</p>

					<section>
						<h2> Commentaires </h2>
						<p>
							Toto ‡† 22:55 la 26/03 - Blabla...
						</p>
						<p>
							Tutu ‡† 20:12 la 26/03 - Blabla...
						</p>
						<p>
							Tata ‡† 19:35 la 26/03 - Blabla...
						</p>
					</section>

			</article>
			</div>

		<footer>
			<p>RÈalisÈ par De Suremain Louis-Marie et Freeman Benjamin </p>

		</footer>
	</body>

</html>