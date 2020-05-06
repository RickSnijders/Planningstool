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
		<div class="selectGame">
			<button onclick="location.href='newuitlegger.php'">+ Toevoegen</button>
		</div>
		
		<div class="selectGame">
			<?php
				if($uitl!=NULL) { 
			?>
					<label for="id">Uitleggers: </label>
					<select name="id">
									
					<?php
					foreach ($uitl as $row) {	?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>	
					</select>
				<?php 
				} 
				else { 
				?>
					<p>Er zijn nog geen uitleggers, voer er één toe!</p>
				<?php 
				} 
				?>
		</div>

		<footer>
			© Rick Snijders - 2020
		</footer>
	</div>
</body>
</html>