<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


if(isset($_GET["student"])){

	$query = $db->query("SELECT * FROM 
		radovi INNER JOIN nastavnici 
		ON radovi.mentor = nastavnici.id
		INNER JOIN studenti 
		ON studenti.id_stud = radovi.student
		WHERE student = " . $_GET["student"]);
	$rad = $query->fetchAll();
	if(count($rad) > 0){
		
		echo "<dl>
				<dt>Student/ica:</dt>
				<dd><h3>" . $rad[0]["student_ime"] . " " . $rad[0]["student_prezime"] . "</h3></dd>
				<dt>Naslov rada:</dt>
				<dd>" . $rad[0]["naslov"] . "</dd>
				<dt>Jezik:</dt>
				<dd>" . $rad[0]["jezik"] . "</dd>
				<dt>Mentor:</dt>
				<dd>" . $rad[0]["ime"] . " " .  $rad[0]["prezime"] . "</dd>
			 </dl>";
	}else{
		echo "<h4>Rad ne postoji!</h4>";
	}
}

?>

<?php

include("template_podnozje.html");

?>

