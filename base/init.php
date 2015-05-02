<?php
	function init($callback)
	{
		session_start();
		include ('connectdb.php');
?>
		<!DOCTYPE html>
		<html>
			<head>
				<title> Connectif </title>
				<meta charset="UTF-8">
				<link rel="stylesheet" type="text/css" href="ressources/style-projet.css">
			</head>

			<body>
				<?php 

					include('header.php');

					call_user_func($callback);

					include('footer.php');
				?>
				
			</body>
		<html>
<?php
	}
?>