<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:albumi.php");
}

//Ukoliko $_POST["id_albuma"] je nula ($_POST["id_albuma"] == 0) onda znači da dodajemo novi zapis
//Ukoliko $_POST["id_albuma"] nije 0 onda uređujemo postojeći ili brišemo zapis
	//Ako je $_POST["submit"] == "Dodaj/Uredi" onda znači da uređujemo postojeći zapis
	//Ako je $_POST["submit"] == "Potvrdi" onda znači da brišemo postojeći zapis
	//Ako je $_POST["submit"] == "Odustani" onda znači da je pokrenuto brisanje, ali treba odustati i vratiti na albumi.php (ovo može služiti i za odustajanje u bilo kojem slučaju, ako na formu za uređivanje/dodavanje dodamo gumb odustani)



if($_POST["id_albuma"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE albumi SET 
		naslov_albuma = '" . $_POST["naslov_albuma"] . "',
		izvodjac = '" . $_POST["izvodjac"] . "',
		izdavac = '" . $_POST["izdavac"] . "',
		godina_izdanja = '" . $_POST["godina_izdanja"] . "',
		omot = '" . $uploadana_slika . "'
		WHERE
		id_albuma = " . $_POST["id_albuma"] . "

		");
	header("Location:albumi.php");


}elseif($_POST["id_albuma"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM albumi WHERE id_albuma = " . $_POST["id_albuma"]);
	header("Location:albumi.php");


}elseif($_POST["id_albuma"] == 0){
	$upit = $db->query("INSERT INTO albumi 
		(naslov_albuma, izvodjac, izdavac, godina_izdanja, omot)VALUES
		('" . $_POST["naslov_albuma"] . "',
		'" . $_POST["izvodjac"] . "',
		'" . $_POST["izdavac"] . "',
		'" . $_POST["godina_izdanja"] . "',
		'" . $uploadana_slika . "')
		");
	header("Location:albumi.php");
}

?>
