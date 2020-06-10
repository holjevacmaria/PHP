<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM izdavaci");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Izdavači</th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='albumi_izdavaci.php?id=" . $stavka["id_izdavaca"] . "'>" . $stavka["ime"] . "</a></td>
		  	<td>";
	
	$query = $db->query("SELECT * FROM albumi WHERE izdavac = " . $stavka["id_izdavaca"]);
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