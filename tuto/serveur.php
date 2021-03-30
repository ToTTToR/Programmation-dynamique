<?php

session_start();

if(!isset($_SESSION['maVariable'])){
    $_SESSION['maVariable'] = 0;
} else {
    $_SESSION['maVariable']++;
}
$_SESSION['Truc'] = "\nmabite";
echo $_SESSION['maVariable'];
echo $_SESSION['Truc'];
?>