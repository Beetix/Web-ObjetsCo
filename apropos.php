<?php
	require('base/init.php');

	init('apropos');

	function apropos()
	{
?>
		
		<section>
			<h2> A propos </h2>
			<article>
				<h2>Pourquoi ?</h2>
				<p>
					Site sur le thème des objets connectés. Celui-ci a été réalisé dans le cadre de nos cours d'HTML/CSS à l'IUT d'Informatique à Lyon 1. Codé seulement sans PHP d'où le non-fonctionnement de pages censées être dynamiques.  
				</p>
	
				<p>
					En espérant que ce site vous plaise, bonne visite !
				</p>
				<h2>Qui ?</h2>
				<p>
					Benjamin Freeman et Louis-Marie de Suremain, deux étudiants d'un IUT informatique.
				</p>				
				<h2>Quand ?</h2>
				<p>
					En mars 2015.
				</p>
				<h2>Comment ?</h2>
				<p>
					Eclipse + validateurs CSS et HTML + <a href="https://github.com/Beetix/Web-ObjetsCo">Github</a>
				</p>
				<h2>Vous avez des questions ?</h2>
				<p>
					n'hésitez pas à nous en parler via <a href="mailto:pigeon@univ.iut.extension.mail.info.com"> la fonction "MailTo"</a> de votre navigateur.
				</p>
			</article>
		</section>

<?php
	}
?>