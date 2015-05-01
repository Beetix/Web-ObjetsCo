

<html>

<?php
include 'header.php';
?>

	<body>

		<header>
			<h1> Connectif</h1>
		</header>

		<nav>
			<ul>
				<li> <a href="index.php"> Accueil </a> </li>
				<li> <a href="ajoutarticle.php" class="actuel"> Ajouter un article </a> </li>
				<li> <a href="rechercherarticle.php"> Rechercher un article </a> </li>
				<li> <a href="apropos.php"> A propos </a> </li>
			</ul>

			<img src="ressources/prise.png" alt="prise">


		</nav>

		<section>
		<?php

		 
		 
			 
		 print_r($_POST);
	 
		 if (count($_POST) <= 0) 
		 //(!isset($utilisateur_id,$utilisateur_pseudo,$utilisateur_mail,$article_titre,$article_stitre,$article_photo,$article_contenu))
		{
		?>
			<form method="post" enctype="multipart/form-data" action="" >
				<h2>Ajouter votre article</h2>
				<fieldset>
					<legend>Vos coordonnÃ©es</legend>
						<table>
							<tr>
								<td>Nom </td><td><input type="text" name="utilisateur_id" placeholder="NOM"></td>
							</tr>
							<tr>
								<td>Pseudo</td> <td><input type="text" name="utilisateur_pseudo" placeholder="Exemple : @Louimsdu69"></td>
							</tr>
							<tr>
								<td>E-Mail </td><td><input type="text" value="" name="utilisateur_mail" placeholder="leBGduWeb@univ.lyon.fr"></td>
							</tr>
						</table>
						<label>Courte description pour que les internautes puissent mieux vous connaitre ! 
							<textarea name="utilisteur_desc" rows="4" cols="50" placeholder="Ex : Etudiant en DUT info, et passionnÃ© des technologies mobiles !">
							</textarea>
						</label>
				</fieldset>
				<fieldset>
					<legend>Votre article</legend>
					
						<p>
							<label><input type="text" name="article_titre" placeholder="Titre - 45 carcatÃ¨res max."></label>
						</p>
						<p>
							<label><input type="text" name="article_stitre" placeholder="Sous-titre - 150 carcatÃ¨res max."></label>
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
		

			
			
			// traitement de l'ajout des données
			include("./connectdb.php");
			$bdd = Connect_db(); //connexion à la BDD
			$query=$bdd->prepare('
 	
						INSERT INTO bdd_article (`utilisateur_id`, `article_titre`, `article_stitre`, `article_contenu`) 
						VALUES
						(:userid,:titre,:soustitre,:content);'
			);
			$query->execute(array
					('userid' => $_POST['utilisateur_id'],
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
					<h3> <?php echo "Votre sous-titre (éventuel ?) "; ?> </h3>
		
					<p> 
					<?php echo "contenu de l'article à récupérer"; ?>
					</p>
			</article>
		
			<?php 
			
			}
			?>
		
		
		</section>

		<footer>
			<p>RÃ©alisÃ© par De Suremain Louis-Marie et Freeman Benjamin </p>

		</footer>
		
	</body>
</html>