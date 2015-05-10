<?php
	require('base/init.php');

	init('authentification');

	function authentification()
	{		
		
		if (empty($_POST)) 
		{
?>
			<article>
				<h2>Je me connecte :</h2>
				<form  method="post" enctype="multipart/form-data" action=""  >
					<table>
						<tr><td>Pseudo</td><td><input type="text" name="nomauth" value=<?php if (isset($_COOKIE['utilpseudo'])) echo $_COOKIE['utilpseudo']; ?> ></td></tr>
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
		
			
		else {
			
			
					
					
				// traitement de la connexion
				$bdd = Connect_db(); //connexion à la BDD
				$query=$bdd->prepare('SELECT utilisateur_id ,utilisateur_mdp, utilisateur_pseudo, webmaster FROM utilisateurs WHERE utilisateur_pseudo = :utilpseudo AND utilisateur_mdp = :utilmdp');
				$query->execute(array
						('utilpseudo' => $_POST['nomauth'],
						 'utilmdp' => $_POST['mdpauth'])
				);



				if ($util = $query->fetch())
				{
					$_SESSION['utilid'] = $util['utilisateur_id'];
					$_SESSION['utilpseudo'] = $util['utilisateur_pseudo'];
					if ($util['webmaster'] != 0)
						$_SESSION['est_admin'] = true;

					setcookie("utilpseudo", $_SESSION['utilpseudo'], time()+ 3600 * 24,null,null,false,true); // Cookie valable 1 jour

					echo '<h2> Vous êtes maintenant connecté </h2>';
				}
				else
				{
					echo '<h2> Pseudo et/ou Mot de passe incorrect';
				}
			
			 	
				 
		}		
			
	}
?>


