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
			
			$stmt = $conn->prepare("UPDATE moosiriiul SET kogus=0 WHERE moosisort = ?;");
			$stmt->bind_param("s", $moosisort);
			$stmt->execute();
			echo $stmt->error;
            /*$stmt = $conn->prepare("SELECT INTO moosiriiul (moosisort, tyhistamine) VALUES(?,0)");
            echo $conn->error;
            //seome SQL käsu õigete andmetega
            //andmetüübid  i - integer   d - decimal    s - string
            $stmt->bind_param("i", $tyhistamine);
            if($stmt->execute()){
                $moosisort = null;


            }
            //sulgeme käsu
            $stmt->close();
            //andmebaasi ühenduse kinni
            $conn->close(); */
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
	<h1 style="position: auto;margin: 3% 40%;color: purple;">Kogu moosi võtmine</h1>

    <form method="POST">
	
        <label for="moosisort_input">Sisesta moosisort: </label>
        <input type="text" name="moosisort_input" id="moosisort_input" placeholder="Moosisort...">
		<br>
        <input type="submit" name="moosiriiul_submit" value="Võta kõik">
		
        <span><?php //echo $moosiriiul_error ?></span>
    </form>
</body>
</html>