<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
   	$upit = $db->query("DELETE FROM albumi WHERE id_albuma = " . $id);
	header("Location:albumi.php");

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
    Želite li stvarno pobrisati album "<b><?php echo $naslov_albuma; ?></b>"

    <input type="submit" name="submit" value="Potvrdi" class="button">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>