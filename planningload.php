<?php
	include('function.php');
	$game = GamesID();
	$result = Games();
	$uitl = UitleggersNaam();
	$spelers = Spelers();
	$players = AantalPlayers();
	$uitlegadd = UitleggerAdd();
	$datumadd = DatumAdd();
	$selSpelers = Spelerdb();
	$spelersaantal = SelectedSpelersCount();
	
	header("Refresh: 1; URL=planning.php");

?>	
		