<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;
if($id == 0){
	$ime = "";
	$prezime = "";
	$korisnicko_ime = "";
	$lozinka = "";
	$gumb = "Dodaj";
}else{
	$query = $db->query("SELECT * FROM administratori WHERE id = " . $id);
	$rezultati = $query->fetchAll();
	$ime = $rezultati[0]["ime"];
	$prezime = $rezultati[0]["prezime"];
	$korisnicko_ime = $rezultati[0]["korisnicko_ime"];
	$lozinka = $rezultati[0]["lozinka"];
	$gumb = "Spremi";	
}
	
?>

<form method="post" action="pristup_izmjena.php?akcija=uredi&id=<?php echo $id ?>">
Ime: <input type="text" name="ime" value="<?php echo $ime ?>"><br>
Prezime: <input type="text" name="prezime" value="<?php echo $prezime ?>"><br>
Korisničko ime: <input type="text" name="korisnicko_ime" value="<?php echo $korisnicko_ime ?>"><br>
Lozinka: <input type="text" name="lozinka" value="<?php echo $lozinka ?>"><br>
<input type="submit" name="Submit" value="<?php echo $gumb ?>">
</form>

<?php
include("template_podnozje.html");
?>