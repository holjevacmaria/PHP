<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


$query = $db->query("SELECT *, studiji.naziv AS naziv_studija, odsjeci.naziv AS naziv_odsjeka,
	studiji.id AS id_studija 
	 FROM studiji LEFT JOIN odsjeci ON studiji.odsjek = odsjeci.id ORDER BY studiji.naziv");



$rezultati = $query->fetchAll();


?>
<table>
	<tr>
	<th>Studij</th>
	<th>Odsjek</th>
	<th><a href="uredjivanje_studija.php">Novi studij</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	
	echo "<tr>
		<td>" . $stavka["naziv_studija"] .  "</td>
		<td>" . $stavka["naziv_odsjeka"] .  "</td>
		<td><a href='uredjivanje_studija.php?id=" . $stavka["id_studija"] . "&akcija=brisanje'>pobriši</a></td>
	  </tr>";

}
?>
</table>
<?php


include("template_podnozje.html");

?>