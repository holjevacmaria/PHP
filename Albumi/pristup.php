<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM administratori");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Korisnici / administratori</th>
	<th><a href="pristup_forma.php">novi</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td>" . $stavka["ime"] . " " . $stavka["prezime"] . "</td>
		  	<td><a href=\"pristup_forma.php?id=" . $stavka["id"] . "\">uredi</a> | <a href=\"pristup_izmjena.php?akcija=brisanje&id=" . $stavka["id"] . "\">pobriši</a></td>
		  </tr>";
}
?>
</table>
<?php
include("template_podnozje.html");
?>