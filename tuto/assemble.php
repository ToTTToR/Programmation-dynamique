<?php
include "header.php";
include "menu.php";

$truc = $_GET["page"];
    echo $truc;

if(!isset($_GET["page"])){
    
    include "acceuil.php";
} else {
    $page = $_GET["page"];
    echo $page;
    if(file_exists("$page.php")){
        include "$page.php";
    } else {
        echo "<br><br>page introuvable!";
    }
}

include "footer.php";
?>