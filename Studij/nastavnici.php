<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");

$odsjek = isset($_GET["odsjek"]) ? $_GET["odsjek"] : 0;

$query = $db->query("SELECT * FROM odsjeci WHERE id=" . $odsjek);
$rezultati = $query->fetchAll();

foreach($rezultati as $stavka){
	echo "<b>" . $stavka["naziv"] . "</b><br>";
}

if($odsjek == 0){
	$query = $db->query("SELECT * FROM nastavnici");
}else{
	$query = $db->query("SELECT * FROM nastavnici WHERE odsjek = " . $odsjek);
}


$rezultati = $query->fetchAll();


?>
<table>
	<tr>
	<th>Nastavnik</th>
	<!-- LINK prema skripti koja sva tri procesa unosa novog zapisa, uređivanje postojećeg i brisanje.
    Link nema querystring varijabli jer kod unosa novog zapisa otvarama praznu formu -->
    <th><a href="uredjivanje_nastavnika.php">Novi nastavnik</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	
	echo "<tr>
		<td>" . $stavka["ime"] . " " . $stavka["prezime"] .  "</td>
		<td><a href=\"uredjivanje_nastavnika.php?id=" . $stavka["id"] . "&akcija=uredi\">Uredi</a> | 
		<a href=\"uredjivanje_nastavnika.php?id=" . $stavka["id"] . "&akcija=brisi\">Pobriši</a></td>
	  </tr>";
	/*
		U gronjoj echo naredbi ispisujemo dva linka prema skripti za unos/uređivanje/brisanje zapisa
		Link: uredjivanje_nastavnika.php?id=" . $stavka["id"] . "&akcija=uredi
			ima dvije querystring varijable id i akcija. id prenosi idetifikaciju zapisa koji treba urediti ili pobrisati, a akcija određuje da li brišemo ili uređujemo zapis
	*/
}
?>
</table>
<?php


include("template_podnozje.html");

?>