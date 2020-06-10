<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");



$query = $db->query("
	SELECT * FROM studiji INNER JOIN studenti
	ON studiji.id = studenti.studij


	");

$rezultati = $query->fetchAll();

?>
<table>
	<tr>
	<th>Student/ica</th>
	<th>Studij</th>
	<th>Novi student</th>
	<tr>
<?php


foreach($rezultati as $stavka){


	echo "<tr>
			<td><a href='radovi.php?student=" . $stavka["id_stud"] . "'>" . $stavka["student_ime"] . " " . $stavka["student_prezime"] . "</a></td>
		  	<td>" . $stavka["jmbag"] . " - " . $stavka["naziv"] . "</td>
			<td>...</td>
		  </tr>";

}

?>
</table>

<?php

include("template_podnozje.html");

?>