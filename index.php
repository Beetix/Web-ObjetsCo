<?php
	require('base/init.php');

	init('index');

	function index()
	{
?>
		<section id="banniere">
			
			<h2> Bienvenue dans le monde des objets connectés ! </h2>
			
			<p>
				Vous trouverez ici les dernières actualités et les tests d'objets connectés
			</p>
			
			<p> <i> Dernière mise à  jour du site web le 01/05/2015 </i> </p>

		</section>
		
		<article>
			
		<?php 
			$bdd = Connect_db();
			$reqarticle = $bdd->query('SELECT *
											FROM  `bdd_article` 
											WHERE article_date = ( 
											SELECT MAX( article_date ) 
											FROM  `bdd_article` )');
			$dernierarticle = $reqarticle->fetch();
			$reqarticle->closeCursor();
			if (!empty($dernierarticle))
			{

		?>
				
				<h2> <a href="article.php"> Dernier article ajouté :  <?php echo $dernierarticle['article_titre']; ?> </a> </h2>
							<img src="ressources/<?php echo $dernierarticle['article_titre']; ?>.jpg" alt="<?php echo $dernierarticle['article_titre']; ?>">
								
							<h3>  <?php echo $dernierarticle['article_stitre']; ?> </h3>
							
							<p> <?php echo mb_strimwidth($dernierarticle['article_contenu'], 0, 100); ?> </p>
			<?php

				$reqcom = $bdd->query('SELECT *
										FROM bdd_commentaire
										INNER JOIN bdd_utilisateurs
										ON utilisateur_id = com_ref_auteur_id
										WHERE com_date = (SELECT MAX(com_date)
															FROM bdd_commentaire
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

		
		