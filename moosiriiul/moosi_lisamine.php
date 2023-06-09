<?php
    require_once "config.php";
    session_start();

    $moosiriiul_error = null;
    if(isset($_POST['moosiriiul_submit'])) {
        if(!empty($_POST['moosisort_input']) and !empty($_POST['kogus_input'])) {
            $moosisort = $_POST["moosisort_input"];
            $kogus = $_POST["kogus_input"];
            
        } else {
            //$moosiriiul_error = "Täida kõik väljad!";
        }
        if(empty($moosiriiul_error)){

            //loon andmebaasiga ühenduse
            //server, kasutaja, parool, andmebaas
            $conn = new mysqli($server_host, $server_user_name, $server_password, $database);
            //määran suhtlemisel kasutatava kooditabeli
            $conn->set_charset("utf8");
            //valmistame ette andmete saatmise SQL käsu
            $stmt = $conn->prepare("INSERT INTO moosiriiul (moosisort, kogus) VALUES(?,?)");
            echo $conn->error;
            //seome SQL käsu õigete andmetega
            //andmetüübid  i - integer   d - decimal    s - string
            $stmt->bind_param("si", $moosisort, $kogus);
            if($stmt->execute()){
                $moosisort = null;
                $kogus = null;
            }
            //sulgeme käsu
            $stmt->close();
            //andmebaasi ühenduse kinni
            $conn->close();
	
		$kogus = $_POST["kogus_input"];
	
	$moosisort_error = null;
	$kogus = 1;
	//kas valiti moosisort
	if(isset($_POST["moosisort_submit"])){
		if(isset($_POST["moosisort_input"]) and !empty($_POST["moosisort_input"])){
			$moosisort = $_POST["moosisort_input"];
		} else {
			$moosisort_error = "Sisesta moosisort!";
		}
		$kogus = $_POST["kogus_input"];
		
		if(empty($moosisort_error)){
		
			//loon andmebaasiga ühenduse
			//server, kasutaja, parool, andmebaas
			$conn = new mysqli($server_host, $server_user_name, $server_password, $database);
			//määran suhtlemisel kasuatatava kooditabeli
			$conn->set_charset("utf8");
			//valmistame ette andmete saatmise SQL käsu
			$stmt = $conn->prepare("INSERT INTO moosiriiul (moosisort, kogus) values(?,?)");
			echo $conn->error;
			//seome SQL käsu õigete andmetega
			//andmetüübid  i - integer   d - decimal    s - string
			$stmt->bind_param("si", $moosisort, $kogus);
			if($stmt->execute()){
				$kogus = 1;
				$moosisort = null;
			}
			//sulgeme käsu
			$stmt->close();
			//andmebaasiühenduse kinni
			$conn->close();
			
		}
	}
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
	<h1 style="position: auto;margin: 3% 40%;color: purple;">Moosi lisamine</h1>
	<img src="moos2.jpg" alt="moosipurk" class="center">
	<p>Moosi võtmiseks klikka <a href="moosi_votmine.php">siia</a>!</p>
	<hr>
	<form method="POST">
		<select id="moosisort_select" name="moosisort_select">
			<?php echo $select_html; ?>		
		</select>
		<input type="submit" id="moosisort_submit" name "moosisort_submit" value="Lisa">
		
		<label for="kogus_input">Kogus</label>
	<input type="number" id="kogus_input" name="kogus_input" min="1" max="255" step="1" value="<?php echo $kogus; ?>">
	<br>
	</form>


    <form method="POST">
	
	
	
		<p>Lisa uus moosisort</p>
        <label for="moosisort_input">Moosisort: </label>
        <input type="text" name="moosisort_input" id="moosisort_input" placeholder="Sisesta moosisort">
        <br>
        <label for="kogus_input">Kogus: </label>
        <input type="text" name="kogus_input" id="kogus_input" placeholder="Sisesta kogus">
		<br>
        <input type="submit" name="moosiriiul_submit" value="Lisa">
		<hr>
		
        <span><?php echo $moosiriiul_error ?></span>
    </form>
</body>
</html>

<?php

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
			
			$stmt = $conn->prepare("UPDATE moosiriiul SET kogus=kogus+1 WHERE moosisort = ?;");
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
	<label>Olemasoleva moosi lisamine ühe purgi kaupa</label>
	
    <form method="POST">
		<br>
        <label for="moosisort_input">Sisesta moosisort: </label>
        <input type="text" name="moosisort_input" id="moosisort_input" placeholder="Moosisort...">
		<br>
        <input type="submit" name="moosiriiul_submit" value="Lisa üks purk">
		<br>
		
		<br>
        <span><?php //echo $moosiriiul_error ?></span>
		
    </form>
</body>
</html>