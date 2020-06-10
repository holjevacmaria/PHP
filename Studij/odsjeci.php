<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");



$query = $db->query("SELECT * FROM odsjeci");

$rezultati = $query->fetchAll();


?>
<table>
	<tr>
	<th>Naziv odsjeka</th>
	<th><a href="uredjivanje_odsjeka.php">Novi odsjek</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){

	echo "<tr>
			<td><a href='nastavnici.php?odsjek=" . $stavka["id"] . "'>" . $stavka["naziv"] . "</a></td>
		  	<td>
			<a href='uredjivanje_odsjeka.php?id=" . $stavka["id"] . "&akcija=uredjivanje'>uredi</a> |

		  	<a href='uredjivanje_odsjeka.php?id=" . $stavka["id"] . "&akcija=brisanje'>pobriši</a></td>
		  </tr>";

}
?>
</table>
<?php

include("template_podnozje.html");

?>