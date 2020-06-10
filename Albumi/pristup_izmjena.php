<?php
include("session.php");
include("pdo.php");

	$id = isset($_GET["id"]) ? $_GET["id"] : "";
	$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "";
	$ime = isset($_POST["ime"]) ? $_POST["ime"] : "";
	$prezime = isset($_POST["prezime"]) ? $_POST["prezime"] : "";
	$korisnicko_ime = isset($_POST["korisnicko_ime"]) ? $_POST["korisnicko_ime"] : "";
	$lozinka = isset($_POST["lozinka"]) ? $_POST["lozinka"] : "";
	$submit = isset($_POST["Submit"]) ? $_POST["Submit"] : "";
	
	if($akcija == "brisanje"){
		$query = $db->query("DELETE FROM administratori WHERE id = " . $id);
		header("Location:pristup.php");
	}elseif($akcija == "uredi"){
		
		if($submit == "Dodaj"){
			$query = $db->query("INSERT INTO administratori (ime, prezime, korisnicko_ime, lozinka)VALUES('$ime', '$prezime', '$korisnicko_ime', '$lozinka')");
			header("Location:pristup.php");
		}elseif($submit == "Spremi"){
			$query = $db->query("UPDATE administratori SET ime = '$ime', prezime = '$prezime', korisnicko_ime = '$korisnicko_ime', lozinka = '$lozinka' WHERE id = " . $id);
			header("Location:pristup.php");
		}else{
			header("Location:pristup.php");
		}
	}else{
		header("Location:pristup.php");
	}
	
?>