<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM izvodjaci");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Izvođači</th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='albumi.php?id=" . $stavka["id_izvodjaca"] . "'>" . $stavka["ime"] . "</a></td>
		  	<td>";
	
	$query = $db->query("SELECT * FROM albumi WHERE izvodjac = " . $stavka["id_izvodjaca"]);
	$izvodjaci = $query->fetchAll();
	foreach($izvodjaci as $cover){
		echo "<img src='slike/" . $cover["omot"] . "' width='100' height='100'>";
	}


	echo "</td>
		  </tr>";
}
?>
</table>
<?php
include("template_podnozje.html");
?>