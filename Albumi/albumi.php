<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h3>Albumi <small>(<a href='albumi_formular.php'>dodaj novi</a>)</small></h3>";
	$query = $db->query("SELECT * FROM albumi");
}else{
	$query = $db->query("SELECT * FROM izvodjaci WHERE id_izvodjaca = " . $id);
	$rezultati = $query->fetchAll();
	echo "<h1>" . $rezultati[0]["ime"] . "</h1>";
	$query = $db->query("SELECT * FROM albumi WHERE izvodjac = " . $id);
}


$rezultati = $query->fetchAll();

foreach($rezultati as $album){
	echo "<div class=\"row\" style=\"margin-top:26px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
			echo "<img src='slike/" . $album["omot"] . "'>";
		echo "</div>";
		echo "<div class=\"medium-6 large-6 columns\">";
			echo "<strong>" . $album["naslov_albuma"] . "</strong></br>";
		
			$query = $db->query("SELECT * FROM pjesme WHERE album = " . $album["id_albuma"] . " ORDER BY broj_pjesme");
			$pjesme = $query->fetchAll();
			foreach($pjesme as $pjesma){
				echo $pjesma["broj_pjesme"] . ". " . $pjesma["naslov"] . " (" . $pjesma["duljina_trajanja"]  .")<br>";
			}
		echo "</div>";
		echo "<div class=\"medium-3 large-3 columns\">";
		echo "<a href='albumi_formular.php?id=" . $album["id_albuma"] . "'>uredi</a><br><a href='albumi_brisanje.php?id=" . $album["id_albuma"] . "'>pobriši</a>";
		echo "</div>";

	echo "</div>";
}
?>

<?php
include("template_podnozje.html");
?>