<?php>
	require_once "../../config.php";
	
	//loon andmebaasiga ühenduse
	//server, kasutaja, parool, andmebaas
	$conn = new mysqli($server_host, $server_user_name, $server_password, $database);
	//määran suhtlemisel kasutatava kooditabeli
	$conn->set_charset("utf8");
	
	//valmistame ette andmete saatmise SQL käsul
	$stmt = $conn->prepare("SELECT comment, grade, added FROM vp_daycomment_new");
	echo $conn->error;
	//seome saadavad andmed muutujatega
	$stmt->bind_result($comment_from_db, $grade_from_db, $added_from_db);
	//täidame käsu
	$stmt->execute();
	$stmt->fetch();
	//kui saan ühe kirje
	//if($stmt->fetch()){
		//mis selle ühe kirjega teha
	//}
	//kui tuleb teadmata arv kirjeid
	while($stmt->fetch()){
		//echo $comment_from_db;
		//<p>kommentaar, hinne päevale: 6, lisatud xxxxxxx</p>
		$comment_html .= "<p>" .$comment_from_db .", hinne päevale: " .$grade_from_db;
		$comment_html .= ", lisatud" .$added_from_db .".</p> \n";
?>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>aron programmeerib veebi</title>
</head>
<body>
<img src="E:\Aron Paco\public_html\pildid\tlu.jpg" alt="bänner">
<h1>aron programmeerib veebi</h1>
<p>See leht on loodud õppetöö raames ja ei sisalda tõsiseltvõetavat sisu.</p>
<p>Õppetöö toimus <a href="https://www.tlu.ee" target="_blank">Tallinna Ülikoolis</a></p>
<img src="E:\Aron Paco\public_html\pildid\6.jpg" alt="Tallinna Ülikool">
<?php echo $comment_html; ?>
</body>
</html>