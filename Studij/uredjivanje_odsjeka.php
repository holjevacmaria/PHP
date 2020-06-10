<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");


?>

<form method="post" action="">
Naziv odsjeka:
<input type="text" name="naziv" value="">
<input type="hidden" name="id" value="">
<input type="submit" name="submit" value="" class="button">
</form>





<?
include("template_podnozje.html");
?>

