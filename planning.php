<?php
	include('function.php');
	$game = GamesID();
	$result = Games();
	$datumadd = DatumAdd();
	$uitlegadd = UitleggerAdd();
	$result2 = Sorteren();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Planning</title>
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
			 <h1 class="header">Planning</h1>
		</header>
		
		<form method="GET" action="planning.php" class="sorteren">
			<select name="item">
				<option <?php if($_GET['item'] == 'name'){ echo "selected";} ?> value="name">Naam</option>
				<option <?php if($_GET['item'] == 'datum'){ echo "selected";} ?> value="datum">Starttijd</option>
				<option <?php if($_GET['item'] == 'uilegger'){ echo "selected";} ?> value="uitlegger">Uitlegger</option>
				<option <?php if($_GET['item'] == 'spelers'){ echo "selected";} ?> value="spelers">Spelers</option>
			</select>
			<select name="volgorde">
				<option <?php if($_GET['volgorde'] == 'ASC'){ echo "selected";} ?> value="ASC">laag-hoog</option>
				<option <?php if($_GET['volgorde'] == 'DESC'){ echo "selected";} ?> value="DESC">hoog-laag</option>
			</select>
			<input id=button type="submit" value="Sorteren" name="submit">
		</form>
		<button class="nieuw" onclick="location.href='newplanning.php'">+ Nieuw</button>
		<div class="games">
			

		
				
		<?php 
		if(isset($_GET['submit'])){
			$result = Sorteren();
		}
		
		?>
	
			
		

			<?php
			
				foreach($result as $row)   {
					if($row['datum']!= null){ ?>
						<div class="gamemargin">
							<a href="info.php?id=<?php echo $row['id'] ?>">
								<section class="game">
									<p class="naamgame"><?php echo $row['name'] ?></p>
									<p class="datumplanning">Uitgelegd Door: <?php echo $row['uitlegger'] ?></p>
									<p class="datumplanning">Aantal spelers: <?php echo $row['aantalspelers'] ?></p>
									<p class="datumplanning">Spelers: <?php echo $row['spelers'] ?></p>
									<p class="datumplanning">Wanneer: <?php echo $row['datum'] ?></p>
									<p class="datumplanning">Spelduur: <?php echo $row['play_minutes'] ?></p>
									<img class="gamesimg" src="afbeeldingen/<?php echo $row['image'] ?>" >
									
								</section>
							</a>
								<section class="bewerk">
									<a class="bewerkplanning" href="bewerk.php?id=<?php echo $row['id'] ?>">[Bewerk]</a>
									<a class="verwijderplanning" href="verwijderzeker.php?id=<?php echo $row['id'] ?>&des=planning.php">[Verwijder]</a>
								</section>
						</div>
				
			<?php   } 
				}
			?>
				
		</div>


		<footer>
		© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>