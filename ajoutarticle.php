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
			
			// traitement et ajout de la photo de l'article 
			
			if ( isset($_FILES['article_photo'])
				AND $_FILES['article_photo']['error'] == 0
				AND $_FILES['article_photo']['size'] <= 1048576) 
				{  
						$infosfichier = pathinfo($_FILES['article_photo']['name']);
						$ext_upload = $infosfichier['extension'];
						$ext_autorisees = array('jpg', 'jpeg', 'gif', 'png');
						if (in_array($ext_upload, $ext_autorisees))
					{
						
							$newnom = $_POST['article_titre'].'.'.$ext_upload;
							move_uploaded_file($_FILES['article_photo']['tmp_name'],
							'images/'.$newnom );
					}
				}
			
			
			?>
			<h2> <?php echo "Bravo, vous avez ajouté votre article !"; ?> </h2>

			<?php 
			
			}
			?>


		</section>

<?php
	}
?>