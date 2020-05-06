<?php
	include('function.php');
	$game = GamesID();
	$result = Games();
	$uitl = UitleggersNaam();
	$uitlegadd = UitleggerAdd();
	$spelers = Spelers();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Planning</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="newplanning.php"></script>
</head>
<body>
	
	<div class="center">
		<header>
			<ul class="menu">
				<a class="menu-item" href="index.php"><li>Games</li></a>
				<a class="menu-item" href="planning.php"><li>Planning</li></a>
				<a class="menu-item" href="uitleggers.php"><li>Uitleggers</li></a>
			</ul>
			 <h1 class="header">Nieuwe Planning Toevoegen</h1>
		</header>
		<div class="addPlanning">
			<form action="addplanning.php"method="GET">

				<div class="selectGame">
					<label for="id">Kies de game: </label>
					<select name="id">
						
						<?php
						foreach ($result as $row) {
							if($row['datum']== null){	?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> (Spelers: <?php echo $row['min_players']; ?> - <?php echo $row['max_players']; ?>)</option>
						<?php }
						} ?>	
					</select>
				</div>

				<div class="selectGame">
  					
  					<input type="submit">
  						
  				
  				</div>

			</form>
		
				
		</div>


		<footer>
		© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>