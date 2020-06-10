<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


/**************************************************** */

$id = isset($_GET["id"]) ? $_GET["id"] : "novi"; // id nastavnika kojeg treba ili brisati ili mijenjati (ovisno o varijabli akcija)

$akcija = isset($_GET["akcija"]) ? $_GET["akcija"] : "novi";

// Ukoliko smo do ove skripte došli s popisa nastavnika trebamo znati koji link nas je ovdje doveo
// Tri cu mogućnosti : Novi zapis, Uredi ili Pobriši
// Linokovi Uredi i Pobriši imaju u querystringu varijable id i akcija pomoću kojih možemo znati koji je bio kliknut
// Novi zapis nema querystring što znači da ako GET varijable id i akcija ne postoje da je odabran novi zapis i treba prikazati prazan formular

$submit = isset($_POST["submit"]) ? $_POST["submit"] : false;

// Ukoliko se nakon popunjavanja formulara bilo dodavanja novog zapisa ili uiređivanja kliknulo na gumb (Uredi ili Dodaj) to znači da imamo POST submit varijablu i da trebamo prihvatiti podatke i nešto s njima napraviti


if($submit == "Dodaj"){
// Ako se nakon popunjavanja formulara kliknulo na gumb Dodaj. Gore smo tu vrijednost spremili u varijablu $submit - trebamo unijeti podatke u bazu kao novi zapis i vratiti se na popis nastavnika

    $aktivan = (isset($_POST["aktivan"]) ? 1 : 0);

    $upit = $db->query("
    INSERT INTO nastavnici 
    (
        ime,
        prezime,
        soba,
        zvanje,
        odsjek,
        tip,
        aktivan,
        e_mail
    )VALUES(
        '" . $_POST["ime"] . "',
        '" . $_POST["prezime"] . "',
        '" . $_POST["soba"] . "',
        '" . $_POST["zvanje"] . "',
        '" . $_POST["odsjek"] . "',
        '" . $_POST["tip"] . "',
        '" . $aktivan . "',
        '" . $_POST["e_mail"] . "'
        )
    ");
    header("Location:nastavnici.php"); //povratak na nastavnike

}elseif($submit == "Promijeni"){
// Ako se nakon popunjavanja formulara kliknulo na gumb Promijeni. Gore smo tu vrijednost spremili u varijablu $submit - trebamo izmijeniti podatke u bazi i vratiti se na popis nastavnika

    $aktivan = (isset($_POST["aktivan"]) ? 1 : 0);
	//S obzirom da je polje aktivan checkbox u formularu moramo provjeriti postoji li POST aktivan varijabla
	// Checkbox polje ne proslijeđuje nikakve podatke ako nije označeno pa u tom slučaju niti POST varijabla ne postoji.

    $upit = $db->query("
    UPDATE nastavnici SET
    ime = '" . $_POST["ime"] . "',    
    prezime = '" . $_POST["prezime"] . "',    
    soba = '" . $_POST["soba"] . "',    
    zvanje = '" . $_POST["zvanje"] . "',    
    tip = '" . $_POST["tip"] . "',    
    odsjek = '" . $_POST["odsjek"] . "',    
    aktivan = '" . $aktivan . "',    
    e_mail = '" . $_POST["e_mail"] . "'
    WHERE id = " . $_POST["id"] . "    
    ");
    header("Location:nastavnici.php");//povratak na nastavnike
}

if($akcija == "uredi"){
	
	//Ukoliko je querystringom proslijeđn podatak da uređujemo nastavnika. Dakle postoji GET["akcija"] i ako joj je vriojednost "uredi" onda na temelju te varijable znamo da treba iz baze izvuću traženi zapois i popuniti formular.
	
    $gumb = "Promijeni";
	// Pomoću vrijednosti submit gumba znamo da li podatke treba unijeti kao novi zapis ili kao uvom slučaju ovdje promijeniti postpjeći

    $upit = $db->query("SELECT * FROM nastavnici WHERE id = " . $id);
    $nastavnik = $upit->fetchAll();
    $ime = $nastavnik[0]["ime"];
    $prezime = $nastavnik[0]["prezime"];
    $soba = $nastavnik[0]["soba"];
    $zvanje = $nastavnik[0]["zvanje"];
    $tip = $nastavnik[0]["tip"];
    $odsjek = $nastavnik[0]["odsjek"];
    $aktivan = $nastavnik[0]["aktivan"];
    $e_mail = $nastavnik[0]["e_mail"];
    
	//Izvukli smo podatke traženog zapisa i spremili u varijable nazvane kao polja u tabeli (nije neophodno da se zovu isto, al olakšava snalaženje)
	
}elseif($akcija == "brisi"){
    // Ako je je akcija brici, pobriši nastavnika indentificiranog $id varijablom

    $query = $db->query("DELETE FROM nastavnici WHERE id = " . $id);
    header("Location:nastavnici.php"); //povratak na popis nastavnika
    
}else{
	//Ako ništa od gornjih uvijeta nije zadovoljeno znači da treba samo otvoriti prazan formular
    $gumb = "Dodaj";
	// Submit gumb treba biti Dodaj kako bi poslije znali da treba unijeti novi zapis, a ne mijenjati postojeći
    $ime = "";
    $prezime = "";
    $soba = "";
    $zvanje = "";
    $tip = "";
    $odsjek = "";
    $aktivan = "";
    $e_mail = "";
	//ove varijabe trebaju postojati jer se u slučaju izmjene postojećeg zapisa koriste za popunjavanje formulara. U ovom slučaju trebaju ostati prazne, ali moraju postojati.
}


?>
<form method="post" action="">
Ime:
<input type="text" name="ime" value="<?php echo $ime ?>">
Prezime:
<input type="text" name="prezime" value="<?php echo $prezime ?>">
E mail:
<input type="text" name="e_mail" value="<?php echo $e_mail ?>">
Soba:
<input type="text" name="soba" value="<?php echo $soba ?>">
Zvanje:
<input type="text" name="zvanje" value="<?php echo $zvanje ?>">
Odsjek:
<select name="odsjek">
<option value="0">--</option>
<?php
	//Ovdje iz tabele odsjeci izvlačimo sve odsjeke i pounjavamo padajući izbornik
    $upit = $db->query("SELECT * FROM odsjeci");
    $rezultati = $upit->fetchAll();
    foreach($rezultati as $ods){
        $selected = ($ods["id"] == $odsjek) ? "selected" : "";
		//Ukoliko se vrijednost id odsjeka koji trenutno ispisujemo poklapa s odsjeko u varijabli $odsjek to znači da taj odsjek treba biti selektiran
		//To je potrebno u slučaju kada mijenjamo postojeći zapis i treba predselektirati jednu stavku u padajućem izborniku
        echo "<option value=\"" . $ods["id"] . "\" $selected>" . $ods["naziv"] . "</option>";
    }
?>
</select>
Tip:
<select name="tip">
<option value="nastavnik"
<?php
if($tip == "nastavnik") echo " selected"
//Isto kao gore kod Odjskea. S obzirom da je tip nastavnika imamo u padajućem izborniku kod mijenjanja zapisa treba predselektirati stavku u iozbornku ovisno o vrijednosti varijable $tip
?>
>Nastavnik</option>
<option value="vanjski suradnik"
<?php
//Isto ako je nastavnik vanjski suradnik
if($tip == "Vanjski suradnik") echo " selected"
?>>Vanjski suradnik</option>
</select>
Aktivan:
<input type="checkbox" name="aktivan" value="1"
<?php
if($aktivan == 1) echo " checked"
//Isto kao kod padajućeg izbornik, kod checkbox-a treba provjeriti da li iznačiti kvačicom ili ne
?>><br>


<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" name="submit" value="<?php echo $gumb ?>" class="button">
</form>





<?
include("template_podnozje.html");
?>

