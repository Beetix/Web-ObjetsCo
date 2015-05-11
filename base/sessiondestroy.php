<?php 
unset($_COOKIE['utilpseudo']);
session_start();
session_destroy();
header("Location: http://iutdoua-webetu.univ-lyon1.fr/~p1414521/index.php");
exit();
?>