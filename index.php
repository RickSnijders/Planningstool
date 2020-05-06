<?php
	include('function.php');
	$result = Games();



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
		<h1 class="header">Games</h1>
	</header>	
		<div class="games">
			<?php
			foreach ($result as $row) {	?>
				<a class="gamemargin" href="info.php?id=<?php echo $row['id'] ?>">
					<section class="game">
						<p class="naamgame"><?php echo $row['name'] ?></p>
						<img class="gamesimg" src="afbeeldingen/<?php echo $row['image'] ?>" >
					</section>
				</a>
			<?php } ?>
		</div>
	<footer>
		© Rick Snijders - 2020
	</footer>
	</div>
</body>
</html>