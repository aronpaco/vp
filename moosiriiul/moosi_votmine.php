<?php
	require_once "config.php";
	$moosiriiul_html = null;
	//loon andmebaasiga ühenduse
	//server, kasutaja, parool, andmebaas
	$conn = new mysqli($server_host, $server_user_name, $server_password, $database);
	//määran suhtlemisel kasutatava kooditabeli
	$conn->set_charset("utf8");
	
	//valmistame ette andmete saatmise SQL käsu
	$stmt = $conn->prepare("SELECT moosisort, kogus FROM moosiriiul");
	//$stmt = $conn->prepare("DELETE id, moosisort, kogus FROM moosiriiul WHERE kogus <= 0");
	echo $conn->error;
	//seome saadavad andmed muutujatega
	$stmt->bind_result($moosisort_from_db, $kogus_from_db);
	//täidame käsu
	$stmt->execute();
	$moosiriiul_html = null;
	while($stmt->fetch()) {
		//echo moosisort_from_db;
		
		$moosiriiul_html.="<p>".$moosisort_from_db." ".$kogus_from_db." ";
		
		
		$moosiriiul_html .= "</p> \n";
		
	}
	$moosiriiul_error = null;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Moosiriiul</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body style="background-color:#FAFAFA;">

		<h1 style="position: auto;margin: 3% 40%;color: purple;">Moosi võtmine</h1>
		
		<p>Moosi lisamiseks klikka <a href="moosi_lisamine.php">siia</a>!</p>
		<hr>

    </form>
		
		
		<p>Moosisort ja kogus</p>
		<br>
		<?php
		echo $moosiriiul_html;
		
		
		?>
		<hr>
	</body>
</html>

<?php
require_once "config.php";
session_start();

$moosiriiul_error = null;
    if(isset($_POST['moosiriiul_submit'])) {
        if(!empty($_POST['moosisort_input'])) {
            $moosisort = $_POST["moosisort_input"];
			
        } else {
            $moosiriiul_error = "Täida kõik väljad!";
        }
        if(empty($moosiriiul_error)){
			


            //loon andmebaasiga ühenduse
            //server, kasutaja, parool, andmebaas
            $conn = new mysqli($server_host, $server_user_name, $server_password, $database);
            //määran suhtlemisel kasuatatava kooditabeli
            $conn->set_charset("utf8");
            //valmistame ette andmete saatmise SQL käsu
			
			$stmt = $conn->prepare("UPDATE moosiriiul SET kogus=kogus-1 WHERE moosisort = ?;");
			$stmt->bind_param("s", $moosisort);
			$stmt->execute();
			echo $stmt->error;
            
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moosiriiul</title>
</head>
<body>
	<label>Moosi võtmine ühe kaupa</label>
	
    <form method="POST">
		<br>
        <label for="moosisort_input">Sisesta moosisort: </label>
        <input type="text" name="moosisort_input" id="moosisort_input" placeholder="Moosisort...">
		<br>
        <input type="submit" name="moosiriiul_submit" value="Võta üks purk">
		<br>
		
		<br>
        <span><?php //echo $moosiriiul_error ?></span>
		
    </form>
</body>
</html>