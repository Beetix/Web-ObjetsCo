<?php
	require('base/init.php');

	init('authentification');

	function authentification()
	{

		
		
		print_r($_POST);
		
		
		if (count($_POST) <= 0) 
			{
?>
			<article>
				<h2>Je me connecte :</h2>
				<form  method="post" enctype="multipart/form-data" action=""  >
					<table>
						<tr><td>Nom</td><td><input type="text" name="nomauth" ></td></tr>
						<tr><td>Mot de passe</td><td><input type="password" name="mdpauth" ></td></tr>
						<tr><td></td><td><button type="submit" > Se connecter </button></td></tr>
					</table>
				</form>
			</article>
			
			<article>
				<h2>Je crée un compte :</h2>
				<form  method="post" enctype="multipart/form-data" action=""  >
					<table>
						<tr><td>Adresse Mail</td><td><input type="text" name="nomcrea" ></td></tr>
						<tr><td>Nom</td><td><input type="text" name="nomcrea" ></td></tr>
						<tr><td>Mot de passe</td><td><input type="password" name="mdpcrea" ></td></tr>
						<tr><td>Vérification du mot de passe</td><td><input type="password" name="mdpcreaverif" ></td></tr>
						<tr><td></td><td><button type="submit" > Créer un compte </button></td></tr>
						<tr></tr>
					</table>
				</form>
			</article>
			
			<?php
			}
		
			$fichier = fopen('./fichier.txt', 'r+');
			
			if($fichier != NULL)
			{
				fseek($fichier, 0);
				$donnees= date("Y/m/d");
				fputs($fichier, $donnees);
				fclose($fichier);
			}
			else {
			
			
					
					
			// traitement de la connexion
			$bdd = Connect_db(); //connexion à la BDD
			$query=$bdd->prepare('SELECT * FROM bdd_utilisateur (`utilisateur_mdp`, `utilisateur_pseudo`)
								VALUES
								(:utilmdp,:utilnom);'
			);
			$query->execute(array
					('utilnom' => $_POST['nomauth'],
					 'utilmdp' => $_POST['mdpauth'])
			);
			
			session_start();
			
			 print_r($_POST);
			 setcookie("Dateconnection",$valcookie,time()+60,null,null,false,true);
				 
			}		
			
			?>
<?php
	}
?>


