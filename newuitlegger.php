<?php
	include('function.php');
	$result = Games();
	$uitl = UitleggersNaam();
	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Games</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="center">
	<header>
		<ul class="menu">
			<a class="menu-item" href="index.php"><li>Games</li></a>
			<a class="menu-item" href="planning.php"><li>Planning</li></a>
			<a class="menu-item" href="uitleggers.php"><li>Uitleggers</li></a>
			
		</ul>
		<h1 class="header">Uitleggers</h1>
	</header>	
		<form class="addUitlegger" action="uitnew.php" method="GET">
			<label for="naam">Voeg een uitlegger toe: </label>
			<input type="text" name="naam">
			<input type="submit">

		</form>
	<footer>
		© Rick Snijders - 2020
	</footer>
	</div>
</body>
</html>