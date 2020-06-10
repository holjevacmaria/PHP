<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] : 0;
//ukoliko je $id == 0 onda je otvoreno dodavanje novog zapisa
//ako je $id != 0 onda uređujemo postojeći zapis i treba ući u bazu i popuniti polja 

if($id != 0){
    $query = $db->query("SELECT * FROM albumi WHERE id_albuma = $id");
    $rezultati = $query->fetchAll();
    $id_albuma = $rezultati[0]["id_albuma"];
    $naslov_albuma = $rezultati[0]["naslov_albuma"];
    $izvodjac = $rezultati[0]["izvodjac"];
    $izdavac = $rezultati[0]["izdavac"];
    $godina_izdanja = $rezultati[0]["godina_izdanja"];
    $omot = $rezultati[0]["omot"];
}else{
    $id_albuma = 0;
    $naslov_albuma = "";
    $izvodjac = 0;
    $izdavac = 0;
    $godina_izdanja = "";
    $omot = "";
}


?>
<h3>Albumi</h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="albumi_sql.php" enctype="multipart/form-data" name="form" id="forma-albumi">
    <input type="hidden" name="id_albuma" value="<?php echo $id_albuma;?>">
    Naslov albuma
    <input type="text" name="naslov_albuma" value="<?php echo $naslov_albuma;?>">
	Izvođač 
    <select name="izvodjac">
    <option value="0"> -- </option>
    <?php
        $query = $db->query("SELECT * FROM izvodjaci");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $izv){
            if($izvodjac == $izv["id_izvodjaca"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $izv["id_izvodjaca"] . "'" . 
            $selected ." >" . $izv["ime"] . "</option>";
        }
    ?>
    </select>
    <!-- Iz baze izvući sve izvođače i popuniti padajući izbornik i ako je uređujemo postojeći zapis dodati "selected" gdje je potrebno --> 
	Izdavač (Label)
    <select name="izdavac">
    <option value="0"> -- </option>
     <?php
        $query = $db->query("SELECT * FROM izdavaci");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $izd){
            if($izdavac == $izd["id_izdavaca"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $izd["id_izdavaca"] . "'$selected>" . $izd["ime"] . "</option>";
        }
    ?>   </select>
    <!-- Iz baze izvući sve izdavače i popuniti padajući izbornik i ako je uređujemo postojeći zapis dodati "selected" gdje je potrebno --> 
    Godina izdanja
    <input type="text" name="godina_izdanja" value="<?php echo $godina_izdanja;?>">
    Omot
    <input type="text" name="omot" value="<?php echo $omot;?>" >
    <?php
        if($omot == ""){
            $slika = "dummy.jpg";
        }else{
            $slika = $omot;
        }
    ?>
	<img src="slike/<?php echo $slika; ?>" width="150"><br><br>

    <input type="submit" name="submit" value="Dodaj/Uredi" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>