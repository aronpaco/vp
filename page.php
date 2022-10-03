<?php
	$author_name="Aron Paco Vunk";
	$full_time_now=date("d.m.Y H:i:s");
	$weekday_now=date("N");
	//echo $weekday_now;
	$weekdaynames_et=["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	//echo $weekdaynames_et[$weekday_now-1];
	$hours_now=date("H");
	//echo $hours_now;
	$part_of_day="suvaline päeva osa";
	//	< >	<= >=	==	!=
	if($hours_now<7){
		$part_of_day="uneaeg";
	}
	//      and      or
	if($hours_now>=8 and $hours_now<=18){
	$part_of_day="koolipäev";
	}
	
	//uurime semestri kestust
	$semester_begin= new DateTime("2022-9-5");
	$semester_end= new DateTime("2022-12-18");
	$semester_duration= $semester_begin ->diff($semester_end);
	//echo $semester_duration;
	$semester_duration_days= $semester_duration->format("%r%a");
	$from_semester_begin= $semester_begin->diff(new DateTime("now"));
	$from_semester_begin_days= $from_semester_begin->format("%r%a");
	
	//juhuslik arv
	//kysin massiivi pikkust
	//echo count($weekdaynames_et);
	//echo mt_rand(0, count($weekdaynames_et) -1)
	//echo weekdaynames_et[mt_rand(0, count($weekdaynames_et) -1)];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//juhuslik foto
	$photo_dir= "photos";
	//loen kataloogi sisu
	//$all_files= scandir($photo_dir);
	$all_files= array_slice(scandir($photo_dir), 2);
	//kontrollin, kas ikka foto
	$allowed_photo_types= ["image/jpeg", "image_png"];
	//tsükkel
	//muutuja väärtuse suurendamine 	$muutuja = $muutuja +5
	//									$muutuja +=5
	//kui on vaja liita 1
	//$muutuja ++
	//sama moodi $muutuja -=5 	$muutuja --
	for($i= 0;$i < count($all_files); $i ++
	) $all_files[$i];
	
	//var_dump($all_files);
	//$all_files= array_slice(scandir($photo_dir), 2);
	//var_dump($all_real_files);
	// <im src= "kataloog/fail" alt= "tekst">
	//$photo_html= '<img src="' .$photo_dir ."/" .$all_files[mt_rand(0, count($all_files) -1)] .'"'
	//$photo_html .= ' alt= "Tallinna ülikool">';
	
	

?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name;?> programmeerib veebi</title>
</head>
<body>
<img src="E:\Aron Paco\New folder\tlu.jpg" alt="bänner">
<h1>aron programmeerib veebi</h1>
<p>See leht on loodud õppetöö raames ja ei sisalda tõsiseltvõetavat sisu.</p>
<p>Õppetöö toimus <a href="https://www.tlu.ee" target="_blank">Tallinna Ülikoolis</a></p>

<p>Praegu on <?php echo $part_of_day;?>.</p>
<p>Semestri pikkus on <?php echo $semester_duration_days;?> päeva.</p> See on kestnud juba <?php echo $from_semester_begin_days; ?> päeva.</p>
<img src="E:\Aron Paco\New folder\6.jpg" alt="Tallinna Ülikool">
</body>
</html>