<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


$query = $db->query("SELECT * FROM administratori");

$rezultati = $query->fetchAll();


?>
<table>
	<tr>
	<th>Ime i prezime</th>
	<th><a href="uredjivanje_administratora.php">Novi administrator</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){

	echo "<tr>
			<td>" . $stavka["ime"] . " " . $stavka["prezime"] ."</td>
		  	<td>
			<a href='uredjivanje_administratora.php?id=" . $stavka["id"] . "&akcija=uredjivanje'>uredi</a> |

		  	<a href='uredjivanje_administratora.php?id=" . $stavka["id"] . "&akcija=brisanje'>pobriši</a></td>
		  </tr>";

}
?>
</table>
<?php

include("template_podnozje.html");

?>