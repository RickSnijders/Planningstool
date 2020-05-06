<?php
	include('function.php');
	$game = GamesID();
	$result = Games();
	$uitl = UitleggersNaam();
	$spelers = Spelers();
	$players = AantalPlayers();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Bewerk</title>
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
			 <h1 class="header">Bewerk Planning</h1>
		</header>
		<div class="selectGame">
			<h2><?php echo $game['name'] ?></h2>
			<h3>Spelers: <?php echo $game['min_players']; ?> - <?php echo $game['max_players']; ?> </h3>
		</div>
		<div class="addPlanning">
			<form id="gameinput" action="" method="POST">
					<input name="id" type="hidden" id="myFile" value="<?php echo $game['id'] ?>">	
				<div class="selectGame">

					<label for="iduitleg">Kies de uitlegger: </label>
					<select name="iduitleg">
						<?php
						foreach ($uitl as $row) {	?>
							<option <?php if($game['uitlegger'] ==  $row['name']){ echo 'selected';} ?> value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
						<?php } ?>	
					</select>
				</div>
				<div class="selectGame">
					<p>Gebruik ctrl om meerdere spelers te selecteren:</p>
					<select id="namesid" class="names" name="name[ ]" multiple size="12" required >
						
					<?php
						foreach ($spelers as $row) {	?>
							<option type="checkbox" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
 						
 					<?php } ?>
 					</select>
				</div>
				

				


				<div class="selectGame">
					<label for="datumtijd">Kies je tijd: </label>
	  				<input value="2020-04-23T00:00" type="datetime-local" min="2020-04-23T00:00" max="2030-04-23T00:00" name="datumtijd" required>
	  			</div>

  				<div class="selectGame">
  					<input type="submit" value="Bewerk" onclick="test();">
  						
  				
  				</div>

			</form>
		<script type="text/javascript">
			var aantal;
					function test(){
						var aantalSelect = document.getElementById('namesid').selectedOptions;
						aantal = aantalSelect.length;
						if(aantal < <?php echo $players['min_players'] ?>){
							alert("Selecteer minimaal <?php echo $players['min_players'] ?> spelers voor <?php echo $players['name'] ?> ");
						}else if(aantal > <?php echo $players['max_players'] ?>){
							alert("Selecteer maximaal <?php echo $players['max_players'] ?> spelers voor <?php echo $players['name'] ?> ");
						} else{
						    alert("Planning bewerkt");
						    document.getElementById('gameinput').action = 'planningload.php?spelersaantal=' + aantal;
						}
					}
		</script>
					
		</div>


		<footer>
		© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>