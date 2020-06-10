<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"] == "ulogiran"){
    //sve je OK
}else{
    header("Location:login.php");
}

?>