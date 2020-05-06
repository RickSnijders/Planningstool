<?php
	include('function.php');
	$game = GamesID();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Weet je het zeker?</title>
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
			 <h1 class="header">Planning verwijderen</h1>
		</header>
		<div class="addPlanning">
			<div class="selectGame">
				<h2>Weet je zeker dat je <?php echo $game['name']; ?> wilt verwijderen? </h2>
				<a class="zekerknop" href="delplanning.php?id=<?php echo $_GET['id'] ?>&des=<?php echo $_GET['des'] ?>">Ja</a>
				<a class="zekerknop" href="<?php echo $_GET['des'] ?>?id=<?php echo $_GET['id'] ?>">Nee</a>
			</div>
				
		</div>


		<footer>
		© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>
