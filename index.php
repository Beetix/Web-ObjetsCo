<?php
	require('base/init.php');

	init('index');

	function index()
	{
?>
		<section id="banniere">
			
			<h2> Bienvenue dans le monde des objets connect�s ! </h2>
			
			<p>
				Vous trouverez ici les derni�res actualit�s et les tests d'objets connect�s
			</p>
			
			<p> <i> Derni�re mise � jour du site web le 01/05/2015 </i> </p>

		</section>
		
		<article>
			
		<?php 
			$bdd = Connect_db();
			$reqarticle = $bdd->query('SELECT *
											FROM  articles 
											WHERE article_date = ( 
											SELECT MAX( article_date ) 
											FROM  articles )');
			$dernierarticle = $reqarticle->fetch();
			$reqarticle->closeCursor();
			if (!empty($dernierarticle))
			{

		?>
				
				<?php echo '<h2> <a href="article.php?article_id=' . $dernierarticle['article_id'] . '"> Dernier article ajouté : ' . $dernierarticle['article_titre'] . '</a> </h2>'; ?>
							<img src="images/<?php echo $dernierarticle['article_id']; ?>" alt="<?php echo $dernierarticle['article_titre']; ?>">
								
							<h3>  <?php echo $dernierarticle['article_stitre']; ?> </h3>
							
							<p> <?php echo substr($dernierarticle['article_contenu'], 0, 100); ?> </p>
			<?php

				$reqcom = $bdd->query('SELECT *
										FROM commentaires
										INNER JOIN utilisateurs
										ON utilisateur_id = com_ref_auteur_id
										WHERE com_date = (SELECT MAX(com_date)
															FROM commentaires
															WHERE com_ref_article_id = ' . $dernierarticle['article_id'] . ')
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
			?>
			
		</article>
<?php
	}
			
?>

		
		