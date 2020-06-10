<?php
include("template_zaglavlje.html");

include("pdo.php");


if(isset($_POST["submit"])){
}


?>

<form method="post" action="">
Ime:
<input type="text" name="username" value="">
Prezime:
<input type="password" name="lozinka" value="">
<input type="submit" name="submit" value="Dalje" class="button">
</form>


<?
include("template_podnozje.html");
?>

