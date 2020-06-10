<?php
include("template_zaglavlje_login.html");
include("pdo.php");

if(isset($_POST["Submit"]) && $_POST["Submit"] == "Dalje"){
    $upit = $db->query("SELECT * FROM administratori WHERE korisnicko_ime = '" . $_POST["korisnicko_ime"] . "'" );
    $admin = $upit->fetchAll();
    //print_r($admin);
    //exit;
//lozinku provjeravat izvan sql upita zbog napada, ovako provjerava da li je lozinka ista onome što je u tablici lozinka




/******************************************************************************************************* */
// odaberi izvođača padajuci izbonik, aktivirati session, posloziti select boxove kako treba za uređivanje
/******************************************************************************************************* */




    if(count($admin)==0 && $admin[0]["lozinka"] == $_POST["lozinka"]){
        $poruka = "Pogrešni korisnički podaci";
        
    }else{
        $poruka ="";
        session_start();
        $_SESSION["user"] = "ulogiran";
        $_SESSION["ime_prezime"] = $admin[0]["ime"] . " " . $admin[0]["prezime"];
        header("Location:albumi.php");
    }
}else{
    $poruka ="";
}


?>

<div class="medium-4 medium-offset-4">
<p align="center">Prijava</p>
<?php echo "<h2>" . $poruka . "</h2>"; ?>
<form action="" method="post">

Korisničko ime: <input type="text" name="korisnicko_ime"  /><br />
Lozinka: <input type="password" name="lozinka" /><br />
<input type="submit" name="Submit" value="Dalje" />
</form>
</div>
<?php
include("template_podnozje.html");
?>