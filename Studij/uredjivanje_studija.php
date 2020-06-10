<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


?>

<form method="post" action="">
Naziv studija:
<input type="text" name="naziv">
Razina studija:
<input type="text" name="razina_studija">
<input type="submit" name="submit" value="Dodaj" class="button">
</form>





<?
include("template_podnozje.html");
?>

