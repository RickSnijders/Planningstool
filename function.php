<?php 

	function DatabaseConnect(){
		$servername = "localhost";
	    $username = "root";
	    $password = "mysql";
	    $database = "planningstool";

	    try {
	        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	        // set the PDO error mode to exception
	        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        // echo "Connected successfully";
	        return $conn;
	    }
	    catch(PDOException $e)
	    {
	        echo "Connection failed: " . $e->getMessage();
	    }

	}

	function Games(){
		$conn = DatabaseConnect();
		$query = $conn->prepare("SELECT * FROM games");
    	$query->execute();
    	$result = $query->fetchAll();
    	return $result;
    }

    function UitleggersNaam(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("SELECT name FROM uitlegger");
        $query->execute();
        $uitl = $query->fetchAll();
        return $uitl;
    }

    function AddUitlegger(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("INSERT INTO `uitlegger` (`name`) VALUES (:naam) ");
        $naam = $_GET['naam'];
        $naam = trim($naam);
        $naam = htmlspecialchars($naam);
        $naam = stripslashes($naam);
        if($naam!=null){
            $query->execute([':naam' => $naam]);
            echo '<script type="text/javascript">'; 
            echo 'alert("Uitlegger succesvol toegevoegd");'; 
            echo 'window.location.href = "uitleggers.php";';
            echo '</script>';
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Je hebt niks toegevoegd");'; 
            echo 'window.location.href = "newuitlegger.php";';
            echo '</script>';
        }
    }

    function DatumAdd(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("UPDATE games SET datum = :datumtijd WHERE id = :id");
        $query->execute([':datumtijd' => $_POST['datumtijd'],':id' => $_POST['id']]);
    }

    function Spelerdb(){
        $namen = [];
        foreach ($_POST['name'] as $names =>$value)
            {
                $namen[] = $value;
            };  
        $spelernamen = implode( ", ", $namen );
        $conn = DatabaseConnect();
        $query = $conn->prepare("UPDATE games SET spelers = :spelers WHERE id = :id");
        $query->execute([':spelers' => $spelernamen,':id' => $_POST['id']]);
    }

    function UitleggerAdd(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("UPDATE games SET uitlegger = :iduitleg WHERE id = :id");
        $query->execute([':iduitleg' => $_POST['iduitleg'],':id' => $_POST['id']]);
    }

    function DatumDelete(){
            $conn = DatabaseConnect();
            $query = $conn->prepare("UPDATE games SET datum = NULL WHERE id = :id");
            $query->execute([':id' => $_GET['id']]);
    }

 //    function CharacterCount(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("SELECT COUNT(id) FROM characters");
	//     $aantal = $query->execute();
	//     $aantal = $query->fetch();
	//     return $aantal;
 //    }

 //    function LocationCount(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("SELECT COUNT(id) FROM locations");
	//     $aantalLoc = $query->execute();
	//     $aantalLoc = $query->fetch();
	//     return $aantalLoc;
 //    }

    function GamesID(){
    	$conn = DatabaseConnect();
    	$query = $conn->prepare("SELECT * FROM games WHERE id = :id");
	    $query->execute([':id' => $_GET['id']]);
	    $game = $query->fetch();
	    return $game;
    }

    function AantalPlayers(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("SELECT * FROM games WHERE id = :id");
        $query->execute([':id' => $_GET['id']]);
        $players = $query->fetch();
        return $players;
    }
    function Spelers(){
        $conn = DatabaseConnect();
        $query = $conn->prepare("SELECT * FROM spelers");
        $query->execute();
        $spelers = $query->fetchAll();
        return $spelers;
    }

    function SelectedSpelersCount(){
            $conn = DatabaseConnect();
            $query = $conn->prepare("UPDATE games SET aantalspelers = :spelersaantal WHERE id = :id");
            $query->execute([':spelersaantal' => $_GET['spelersaantal'],':id' => $_POST['id']]);
    }

    function Sorteren(){
        $conn = DatabaseConnect();
        if($_GET['item'] == 'name'){
            if($_GET['volgorde'] == 'ASC'){
                $query = $conn->prepare("SELECT * FROM games ORDER BY name ASC");
            } else{
                $query = $conn->prepare("SELECT * FROM games ORDER BY name DESC");
            }
            $query->execute();
            $result2 = $query->fetchAll();
            return $result2;
        }
        else if($_GET['item'] == 'datum'){
            if($_GET['volgorde'] == 'ASC'){
                $query = $conn->prepare("SELECT * FROM games ORDER BY datum ASC");
            } else{
                $query = $conn->prepare("SELECT * FROM games ORDER BY datum DESC");
            }
            $query->execute();
            $result2 = $query->fetchAll();
            return $result2;
        }
        else if($_GET['item'] == 'uitlegger'){
            if($_GET['volgorde'] == 'ASC'){
                $query = $conn->prepare("SELECT * FROM games ORDER BY uitlegger ASC");
            } else{
                $query = $conn->prepare("SELECT * FROM games ORDER BY uitlegger DESC");
            }
            $query->execute();
            $result2 = $query->fetchAll();
            return $result2;
        }
        else if($_GET['item'] == 'spelers'){
            if($_GET['volgorde'] == 'ASC'){
                $query = $conn->prepare("SELECT * FROM games ORDER BY aantalspelers ASC");
            } else{
                $query = $conn->prepare("SELECT * FROM games ORDER BY aantalspelers DESC");
            }
            $query->execute();
            $result2 = $query->fetchAll();
            return $result2;
        }
        
    }



 //    function Locations(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("SELECT * FROM locations");
	//     $query->execute();
	//     $location = $query->fetchAll();
	//     return $location;
 //    }



 //    function LocatieNaam(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("SELECT name FROM locations WHERE id = :locatie");
 //    	$query->execute([':locatie' => $_GET['locatie']]);
 //    	$locatieNaam = $query->fetch();
 //    	return $locatieNaam;
 //    }
 //    function UpdateLocation(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("UPDATE characters SET location = :locatie WHERE id = :id");
	//     $query->execute([':id' => $_GET['id'],':locatie' => $_GET['locatie']]);
 //    }


 //    function LocationAdd(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("INSERT INTO `locations` (`name`) VALUES (:locatieadd) ");
 //    	$addLocatie = $_GET['LocatieToevoegen'];
 //    	$test = trim($addLocatie);
 //    	$test = htmlspecialchars($test);
 //    	$test = stripslashes($test);
 //    	if($addLocatie!=null){
 //    		$query->execute([':locatieadd' => $test]);
 //    		echo '<script type="text/javascript">'; 
	// 		echo 'alert("Locatie succesvol toegevoegd");'; 
	// 		echo 'window.location.href = "locaties.php";';
	// 		echo '</script>';
 //    	}else{
	// 		echo '<script type="text/javascript">'; 
	// 		echo 'alert("Je hebt niks toegevoegd");'; 
	// 		echo 'window.location.href = "locatieadd.php";';
	// 		echo '</script>';
 //    	}
	   

 //    }

 //    function LocationDelete(){
 //    	$conn = DatabaseConnect();
 //    	$query = $conn->prepare("DELETE FROM locations WHERE id = :locatie");
 //    	$query->execute([':locatie' => $_GET['locatie']]);
    	
 //    }

?>

