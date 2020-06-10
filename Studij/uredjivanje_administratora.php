<?php
include("session.php");

include("template_zaglavlje.html");

include("pdo.php");

?>

<form method="post" action="">
Ime:
<input type="text" name="ime" value="">
Prezime:
<input type="text" name="prezime" value="">Korisničko ime:
<input type="text" name="username" value="">Lozinka:
<input type="password" name="lozinka" value=""><input type="hidden" name="id" value="">
<input type="submit" name="submit" value="" class="button">
</form>





<?
include("template_podnozje.html");
?>

