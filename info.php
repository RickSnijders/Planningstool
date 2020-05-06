<?php
	include('function.php');
	$game = GamesID();
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Game info</title>
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
			 <h1 class="header">Spelinformatie</h1>
		</header>
		<div>
			<h2 class="gamenaam">Game: <?php echo $game['name'] ?></h2>
			<section class="info">
				<div class="">
					<img class="infoimg" src="afbeeldingen/<?php echo $game['image'] ?>" >
				</div>

				<div class="spelinfo">
				<h3>Spel infomatie</h3>
				<p>Minimale spelers: <?php echo $game['min_players'] ?></p>
				<p>Maximale spelers: <?php echo $game['max_players'] ?></p>
				<p>Speeltijd: <?php echo $game['play_minutes'] ?></p>
				<p>Uitlegtijd: <?php echo $game['explain_minutes'] ?></p>
				
				<?php
					if($game['expansions']!= null){
				?>		
					<p>Expansions: <?php echo $game['expansions'] ?></p>
				<?php
					}
				?>

				</div>

			</section>
			
			
			<section class="info">
				<div>
					
					<?php echo $game['youtube'] ?>
				</div>
				<div class="datumtijd">
					<p>Skills: <?php echo $game['skills'] ?></p>
					<p>Descriptie:<?php echo $game['description'] ?></p>
					<p>Hier te kopen: <a href="<?php echo $game['url'] ?>"><?php echo $game['url'] ?></a></p>
		  			<?php
						if($game['datum']!= null){
					?>		
						<p>Huidige tijd voor <?php echo $game['name'] ?>: <?php echo $game['datum'] ?></p>
						<p>Spelers voor <?php echo $game['name'] ?>: <?php echo $game['spelers'] ?></p>
						<p>Uitlegger: <?php echo $game['uitlegger'] ?></p>
						<a class="verwijderplanning" href="verwijderzeker.php?id=<?php echo $game['id'] ?>&des=info.php">[Verwijder uit planning]</a>
					<?php
						}
					?>
	  			</div>	
			</section>
				
		</div>
		<footer>
		© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>