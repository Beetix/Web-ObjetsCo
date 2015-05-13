<aside>
	<h2> Les news </h2>
	<section>
		<h3><em>Lien FB - 25/03/2015 - LM</em></h3>
		<p> 
			Allez vite découvrir notre nouvelle page <a href="http://www.facebook.com" >Facebook</a> !
		</p>
	</section>
	<?php 
	if (!isset($_SESSION['utilid']))
	{
	?>
		<section>
			<h2>Je me connecte :</h2>
			<form  method="post" enctype="multipart/form-data" action="authentification.php"  >
				<table>
					<tr><td>Pseudo</td><td><input type="text" name="nomauth" value=<?php if (isset($_COOKIE['utilpseudo'])) echo $_COOKIE['utilpseudo']; ?> ></td></tr>
					<tr><td>Mot de passe</td><td><input type="password" name="mdpauth" ></td></tr>
					<tr><td></td><td><button type="submit" > Se connecter </button></td></tr>
				</table>
			</form>
		</section>
	<?php 
	}
	else
	{	
	?>
		<section>
			<h2>Etat de votre connection :</h2>
				<?php 
				$id=$_SESSION['utilid'];
				$bdd = Connect_db();
				$req_com = $bdd->prepare('SELECT utilisateur_pseudo, utilisateur_datecrea
						 FROM  utilisateurs
						 WHERE utilisateur_id = :id');
				$req_com->execute(array('id' => $id));
				while($com = $req_com->fetch())
				{
					?>
					<table>
					<tr>
						<td>Pseudo : </td>
						<td><?php echo $com['utilisateur_pseudo']; ?></td>
					</tr>
					<tr>
						<td>Date inscription :</td>
						<td><?php echo $com['utilisateur_datecrea']; ?></td>
					</tr>
					<tr>
						<td>Nombre de messages postés :</td>
						<td>
						<?php 
							$req_total_com = $bdd-> prepare('SELECT COUNT(*) as nbtotal FROM commentaires WHERE com_ref_auteur_id= :idbis');
							$req_total_com->execute(array('idbis' => $id));
							while($com_total = $req_total_com->fetch())
							{
								echo $com_total['nbtotal'];
							}
							$req_total_com->closeCursor();
						?>
						</td>
					</tr>
					</table>
					<?php 
				}
				$req_com->closeCursor();
		
			?>
		</section>	
	<?php 
	}
	?>
		<section>
		<h2>Rechercher un article</h2>
		<form method="post" action="rechercherarticle.php">	<!--  echo $_SERVER['PHP_SELF']; ?> -->
			<fieldset>
				<legend>Outils de recherche</legend>				
					<table>
						<tr>
							<th>Recherche</th> 
							<td><input type="text" name="mot-cle" placeholder=""></td>
							<td rowspan=3><button type="submit" value="rechercher"><img src="ressources/Loupe.png" width=50px height=50px ></button> </td>
						</tr>
					</table>
				
			</fieldset>

		</form>	
	</section>
</aside>