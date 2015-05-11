<?php
	require('base/init.php');

	init('ajoutarticle');

	function ajoutarticle()
	{
?>
		<section>
		<?php

		 if (count($_POST) <= 0) 
		 //(!isset($utilisateur_id,$utilisateur_pseudo,$utilisateur_mail,$article_titre,$article_stitre,$article_photo,$article_contenu))
		{
		?>
			<form method="post" enctype="multipart/form-data" action="" >
				<h2>Ajouter votre article</h2>
				<fieldset>
					<legend>Votre article</legend>
					
						<p>
							<label><input type="text" name="article_titre" placeholder="Titre - 45 carcatères max."></label>
						</p>
						<p>
							<label><input type="text" name="article_stitre" placeholder="Sous-titre - 150 carcatères max."></label>
						</p>
						<p> Image d'illustration : <br/>
							<label><input type="hidden" name="MAX_FILE_SIZE" value="1048576" >
							<input type="file" name="article_photo"  > </label>
						</p>
						<p>
							<label>Contenu <br/> <textarea name="article_contenu" rows="10" cols="50"></textarea>
							</label>
						</p>
				<button type="submit" value="Envoyer">Soumettre !</button>
				</fieldset>
			</form>

		<?php 
		}
		else {


			
			
			// traitement de l'ajout des donnÃ©es
			$bdd = Connect_db(); //connexion Ã  la BDD
			$query=$bdd->prepare('

						INSERT INTO articles (`utilisateur_id`, `article_titre`, `article_stitre`, `article_contenu`) 
						VALUES
						(:userid,:titre,:soustitre,:content);'
			);
			$query->execute(array
					('userid' => $_SESSION['utilid'],
					'titre' => $_POST['article_titre'],
					'soustitre' => $_POST['article_stitre'],
					'content' => $_POST['article_contenu'] ) 
							);
			
			
			// paramètres et exécution
					
			
			
			
			
			//if erreurs 
			
			//{
			//	afficher message d'erreur et ne pas ajouter d'entrée sur la bbd
			//}
			
			//else 
			
			//{
				
					/*  if (isset($_FILES['fichier'])
						  AND $_FILES['fichier']['error'] == 0
						  AND $_FILES['fichier']['size'] <= 1048576) {  // 1Mo
						   $infosfichier = pathinfo($_FILES['fichier']['name']);
						   $ext_upload = $infosfichier['extension'];
						   $ext_autorisees = array('jpg', 'jpeg', 'gif', 'png');
						   if (in_array($ext_upload, $ext_autorisees)) {
						    move_uploaded_file($_FILES['fichier']['tmp_name'],
						     'destination/' . basename($_FILES['fichier']['name'])); 
						   }
					  }
				 ?>
			
			*/
			
			?>
			<h2> <?php echo "Bravo, vous avez ajouté votre article !"; ?> </h2>
			<article>
					<h2> <?php echo "Votre titre"; ?> </h2>
					<?php 
					//echo "<img src=".getchemin" alt=".getname.">";
					?>
					<h3> <?php echo "Le sous-titre (éventuel ?) "; ?> </h3>

					<p> 
					<?php echo "contenu de l'article à  récupérer"; ?>
					</p>
			</article>

			<?php 
			
			}
			?>


		</section>

<?php
	}
?>