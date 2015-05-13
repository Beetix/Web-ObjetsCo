<?php
	function init($callback)
	{
		session_start();
		include ('connectdb.php');

		// Protection sur les données envoyées

		if (isset($_POST))
		{
			foreach ($_POST as $key => $value) {
				$_POST[$key] = htmlspecialchars($value);
			}
		}

		if (isset($_GET))
		{
			foreach ($_GET as $key => $value) {
				$_GET[$key] = htmlspecialchars($value);
			}
		}

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
					
					include('aside.php');
					
					call_user_func($callback);

					include('footer.php');
				?>
				
			</body>
		<html>
<?php
	}
?>