<?php
	include('function.php');
	$datumdel = DatumDelete();
?>
	<script type="text/javascript">
		alert('Planning verwijderd');
	</script>
<?php
	$destination = $_GET['des'];
	header("Refresh: 1; URL=".$destination."?id=".$_GET['id']);

?>