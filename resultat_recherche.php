<?php
	require('base/init.php');

	init('resultat_recherche');

	function resultat_recherche()
	{
?>
		<section>
			<article>

			<aside>
				<h2>Votre recherche :</h2>
				<section>
					<h3><em>Titre</em></h3>
					<p> 
						<input type="text" value="Objet" >
					</p>
				</section>
				<section>
					<h3><em>Date</em></h3>
					<p> 
						<input type="text" value="26/03/2015" >
					</p>
				</section>
			</aside>
			

				<h2>Resultat de votre recherche</h2>
				
				
						<table>
							<tr>
								<th>Date</th> 
								<th>Titre</th> 

							</tr>
							<tr>
								<td>21/02/2013</td>
								<td>Les objets connectés</td>
							</tr>
							<tr>
								<td>10/06/2013</td>
								<td>Connected object pour les nuls</td>
							</tr>
							<tr>
								<td>26/03/2015</td>
								<td><a href="article.php">Motorola 360</a></td>
							</tr>
							<tr>
								<td>01/03/2015</td>
								<td>Les cubes</td>
							</tr>
						</table>
			</article>
		</section>

<?php
	}
?>