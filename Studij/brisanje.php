<?php
include("session.php");

include("pdo.php");

$odsjek = isset($_GET["odsjek"]) ? $_GET["odsjek"] : 0;

$nastavnik = isset($_GET["nastavnik"]) ? $_GET["nastavnik"] : 0;

if($nastavnik > 0){
	$db->query("DELETE FROM nastavnici WHERE id= " .  $nastavnik);
}

header("Location:nastavnici.php?odsjek=" . $odsjek);

?>